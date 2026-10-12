<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Category;
use App\Formulir;
use App\FormulirPembayaran;
use App\Gallery;
use App\JenisFormulir;
use App\LogAktivity;
use App\Pemberkasan;
use App\Post;
use App\Statistik;
use App\Tamu;
use App\UangPangkal;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();

        if (Auth::user()->role == 'Admin') {
            return view('backend.index', $this->adminData($jenisFormulir));
        }

        return view('backend.index', $this->pendaftarData($jenisFormulir));
    }

    private function adminData($jenisFormulir)
    {
        $today     = Carbon::today();
        $yesterday = Carbon::yesterday();
        $jenisId   = optional($jenisFormulir)->id;

        // Pengunjung 14 hari terakhir (1 query)
        $harian = Statistik::select('tanggal', DB::raw('COUNT(*) as total'))
            ->where('tanggal', '>=', $today->copy()->subDays(13)->toDateString())
            ->groupBy('tanggal')->pluck('total', 'tanggal');
        $visitorDays = [];
        for ($i = 13; $i >= 0; $i--) {
            $d = $today->copy()->subDays($i);
            $visitorDays[] = ['label' => $d->translatedFormat('d M'), 'total' => (int) ($harian[$d->toDateString()] ?? 0)];
        }

        // Pengunjung per bulan tahun berjalan (1 query)
        $bulanan = Statistik::select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('COUNT(*) as total'))
            ->whereYear('tanggal', $today->year)
            ->groupBy('bulan')->pluck('total', 'bulan');
        $visitorMonths = [];
        for ($m = 1; $m <= 12; $m++) {
            $visitorMonths[] = ['label' => Carbon::create(null, $m, 1)->translatedFormat('M'), 'total' => (int) ($bulanan[$m] ?? 0)];
        }

        $visitToday     = (int) ($harian[$today->toDateString()] ?? 0);
        $visitYesterday = (int) ($harian[$yesterday->toDateString()] ?? 0);

        // Funnel PPDB untuk gelombang aktif
        $ppdb = [
            'pendaftar'   => $jenisId ? User::where('role', 'Pendaftar')->where('jenis_formulir_id', $jenisId)->count() : 0,
            'bayar'       => $jenisId ? FormulirPembayaran::where('jenis_formulir_id', $jenisId)->where('status', 'Diterima')->count() : 0,
            'formulir'    => $jenisId ? Formulir::where('jenis_formulir_id', $jenisId)->count() : 0,
            'uangPangkal' => $jenisId ? UangPangkal::where('jenis_formulir_id', $jenisId)->where('cicilan_1_status', 'Diterima')->count() : 0,
            'berkas'      => $jenisId ? Pemberkasan::where('jenis_formulir_id', $jenisId)->count() : 0,
        ];

        // Hal yang perlu ditindaklanjuti admin
        $menungguFormulir = FormulirPembayaran::where('status', 'Menunggu Konfirmasi Admin')->count();
        $menungguPangkal  = UangPangkal::where(function ($q) {
            $q->where('cicilan_1_status', 'Menunggu Konfirmasi Admin')
              ->orWhere('cicilan_2_status', 'Menunggu Konfirmasi Admin')
              ->orWhere('cicilan_3_status', 'Menunggu Konfirmasi Admin');
        })->count();

        $postPerKategori = Category::withCount('posts')->orderByDesc('posts_count')->limit(6)->get();

        return [
            'jenisFormulir'    => $jenisFormulir,
            'stat'             => [
                'pendaftar'    => User::where('role', 'Pendaftar')->count(),
                'pendaftarBaru'=> User::where('role', 'Pendaftar')->where('created_at', '>=', $today->copy()->subDays(7))->count(),
                'berita'       => Post::where('jenis', 'Berita')->where('status', 1)->count(),
                'posts'        => Post::count(),
                'gallery'      => Gallery::count(),
                'tamu'         => Tamu::count(),
                'visitTotal'   => Statistik::count(),
            ],
            'visitToday'       => $visitToday,
            'visitYesterday'   => $visitYesterday,
            'visitorDays'      => $visitorDays,
            'visitorMonths'    => $visitorMonths,
            'ppdb'             => $ppdb,
            'menungguFormulir' => $menungguFormulir,
            'menungguPangkal'  => $menungguPangkal,
            'postPerKategori'  => $postPerKategori,
            'latestPosts'      => Post::with('category')->orderByDesc('id')->limit(5)->get(),
            'latestPendaftar'  => User::where('role', 'Pendaftar')->orderByDesc('id')->limit(6)->get(),
            'latestLogs'       => LogAktivity::orderByDesc('id')->limit(6)->get(),
            'agendaMendatang'  => Agenda::where('start', '>=', $today->toDateString())->orderBy('start')->limit(4)->get(),
        ];
    }

    private function pendaftarData($jenisFormulir)
    {
        $userId = Auth::id();
        $jenisId = optional($jenisFormulir)->id;

        $bayar   = $jenisId ? FormulirPembayaran::where('user_id', $userId)->where('jenis_formulir_id', $jenisId)->first() : null;
        $form    = $jenisId ? Formulir::where('user_id', $userId)->where('jenis_formulir_id', $jenisId)->first() : null;
        $pangkal = $jenisId ? UangPangkal::where('user_id', $userId)->where('jenis_formulir_id', $jenisId)->first() : null;
        $berkas  = $jenisId ? Pemberkasan::where('user_id', $userId)->where('jenis_formulir_id', $jenisId)->first() : null;

        // Ubah status tabel menjadi state langkah: done | wait | reject | todo | locked
        $fromStatus = function ($status) {
            switch ($status) {
                case 'Diterima': return 'done';
                case 'Ditolak': return 'reject';
                case null: return 'todo';
                default: return 'wait';
            }
        };

        $s1 = $fromStatus(optional($bayar)->status);
        $s2 = $form ? 'done' : ($s1 === 'done' ? 'todo' : 'locked');
        $s3 = $s2 !== 'done' ? 'locked' : $fromStatus(optional($pangkal)->cicilan_1_status);
        $s4 = $berkas ? 'done' : ($s3 === 'done' ? 'todo' : 'locked');

        $steps = [
            ['Pembayaran Formulir', 'Transfer biaya formulir lalu unggah bukti pembayaran. Admin akan memverifikasi pembayaran Anda.', url('pendaftar/pembayaran-formulir'), $s1],
            ['Isi Formulir Calon Siswa', 'Lengkapi data diri, data orang tua/wali, dan pilihan jurusan dengan teliti.', url('pendaftar/formulir'), $s2],
            ['Pembayaran Uang Pangkal', 'Bayar uang pangkal (dapat dicicil) dan unggah bukti pembayaran untuk diverifikasi.', url('pendaftar/pembayaran-uang-pangkal'), $s3],
            ['Unggah Berkas', 'Unggah ijazah, pas foto, kartu keluarga, dan akta kelahiran untuk menyelesaikan pendaftaran.', url('pendaftar/pemberkasan'), $s4],
        ];

        $selesai = collect($steps)->where(3, 'done')->count();

        return [
            'jenisFormulir' => $jenisFormulir,
            'steps'         => $steps,
            'selesai'       => $selesai,
            'persen'        => (int) round($selesai / count($steps) * 100),
            'agendaMendatang' => Agenda::where('start', '>=', Carbon::today()->toDateString())->orderBy('start')->limit(4)->get(),
        ];
    }
}
