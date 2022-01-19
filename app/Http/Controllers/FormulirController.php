<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulir;
use App\JenisFormulir;
use DataTables;
use DB;
use App\Helpers\LogAktivity;
use Auth;
use Excel;

class FormulirController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function api()
    {
    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	return DataTables::of(Formulir::where('jenis_formulir_id',$jenisFormulir->id)->orderBy('id','DESC')->get())
    		   			    ->addIndexColumn()
    		   			    ->addColumn('nama', function($data) {
			                    return $data->user->name;
			                })
			                ->addColumn('email', function($data) {
			                    return $data->user->email;
			                })
			                ->addColumn('asal_sekolah', function($data) {
			                    return $data->user->asal_sekolah;
			                })
                		    ->make(true);
    }

    public function index()
    {
        return view('backend.admin.formulir.index');
    }

    public function exportExcel(){
        $jenisFormulir = JenisFormulir::where('status','aktif')->first();
        $dataReal = Formulir::where('jenis_formulir_id',$jenisFormulir->id)->get();
        $namaFile = "data_".$jenisFormulir->nama;
        $i                          = 1;
        $no                          = 1;
        foreach ($dataReal as $row) {
            $data[$i]   =   
            array(
                'no'   => $no++,
                'nama' => $row->user->name,
                'nisn' => $row->nisn, 
                'email' => $row->user->email, 
                'username' => $row->user->username,
                'telepon' => $row->user->telepon,
                'tempat_tanggal_lahir' => $row->user->tempat_tanggal_lahir,
                'jenis_kelamin' => $row->user->jenis_kelamin,
                'agama' => $row->user->agama,
                'asal_sekolah' => $row->user->asal_sekolah,
                'alamat_rumah' => $row->user->alamat_rumah,
                'nama_panggilan' => $row->nama_panggilan,
                'alamat_sekolah' => $row->alamat_sekolah,
                'asal_daerah_sekolah' => $row->asal_daerah_sekolah,
                'pilihan_pertama' => $row->pilihan_pertama,
                'pilihan_kedua' => $row->pilihan_kedua,
                'pilihan_ketiga' => $row->pilihan_ketiga,
                'kewarganegaraan' => $row->kewarganegaraan,
                'anak_ke' => $row->anak_ke,
                'dari_berapa_bersaudara' => $row->dari_berapa_bersaudara,
                'jumlah_saudara_tiri' => $row->jumlah_saudara_tiri,
                'jumlah_saudara_angkat' => $row->jumlah_saudara_angkat,
                'anak_yatim_piatu_angkat' => $row->anak_yatim_piatu_angkat,
                'bahasa' => $row->bahasa,
                'nama_orangtua_atau_wali' => $row->nama_orangtua_atau_wali,
                'no_hp_orangtua_atau_wali' => $row->no_hp_orangtua_atau_wali,
                'tinggal' => $row->tinggal,
                'jarak_tempat_tinggal' => $row->jarak_tempat_tinggal,
                'kesekolah_dengan' => $row->kesekolah_dengan,
                'keterangan_kesehatan' => $row->keterangan_kesehatan,
                'berat_badan' => $row->berat_badan,
                'tinggi_badan' => $row->tinggi_badan,
                'golongan_darah' => $row->golongan_darah,
                'penyakit_yg_pernah_diderita' => $row->penyakit_yg_pernah_diderita,
                'bakat_khusus' => $row->bakat_khusus,
                'prestasi_khusus' => $row->prestasi_khusus,
                'ekskul_yg_diminati' => $row->ekskul_yg_diminati,
                'informasi_penerimaan' => $row->informasi_penerimaan,
                'berasal_dari_smp' => $row->berasal_dari_smp,
                'berasal_dari_smp_terletak' => $row->berasal_dari_smp_terletak,
                'dalam_memilih_sekolah' => $row->dalam_memilih_sekolah,
                'alasan_anda_mendaftar' => $row->alasan_anda_mendaftar,
            );
            $i++;
        }

        $export         = Excel::create($namaFile, function($excel) use($data){
            $excel->sheet('Formulir Siswa', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }
}
