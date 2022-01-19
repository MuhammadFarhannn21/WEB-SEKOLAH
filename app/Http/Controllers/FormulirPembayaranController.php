<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisFormulir;
use App\FormulirPembayaran;
use Auth;
use App\User;
use DB;
use App\Formulir;
use App\UangPangkal;
use App\Aplikasi;
use App\Pemberkasan;
use Barryvdh\DomPDF\Facade as PDF;

class FormulirPembayaranController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Pendaftar');
    }

    public function index()
    {
    	$jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
    	$formulirPembayaran = FormulirPembayaran::where('user_id',Auth::user()->id)
    											->where('jenis_formulir_id',$jenisFormulir->id)
    											->first();

    	return view('backend.pendaftar.formulir-pembayaran.index',compact('formulirPembayaran','jenisFormulir'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
          	'bukti_pembayaran' => 'required|image|mimes:jpg,png,jpeg',
      	]);
    	$jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
    	$path = $request->file('bukti_pembayaran')->store('bukti_formulir_pembayaran');

    	$cek  = FormulirPembayaran::where('jenis_formulir_id', $jenisFormulir->id)
    							  ->where('user_id', Auth::user()->id)
    							  ->first();

    	if($cek == null)
    	{
    		FormulirPembayaran::create([
    			'user_id'			=> Auth::user()->id,
				'jenis_formulir_id'	=> $jenisFormulir->id, 
		        'status'			=> "Menunggu Konfirmasi Admin", 
		        'bukti_pembayaran'	=> $path, 
			]);
    	}
    	else
    	{
    		$cek->update([
    			'status'			=> "Menunggu Konfirmasi Admin", 
		        'bukti_pembayaran'	=> $path, 
    		]);
    	}				  
    	

		toast('Berhasil Mengupload Bukti Pembayaran','success','top-right');
        return redirect()->back();
    }

    public function biodata_index()
    {
        $data = User::findOrFail(Auth::user()->id);
        return view('backend.pendaftar.biodata.index',compact('data'));
    }

    public function biodata_store(Request $request)
    {
        $data = User::findOrFail(Auth::user()->id);
        $request['password']    = $request->get('password') ? bcrypt($request->get('password')) : $data->password;
        $data->update([
            'name' => $request->name,
            'password' => $request->password,
            'telepon' => $request->telepon,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_rumah' => $request->alamat_rumah,
        ]);
        toast('Berhasil Mengedit Biodata','success','top-right');
        return redirect()->back();
    }

    public function formulir_index()
    {
    	$jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
    	$formulirPembayaran = FormulirPembayaran::where('user_id',Auth::user()->id)
    											->where('jenis_formulir_id',$jenisFormulir->id)
    											->first();
        $formulir  = Formulir::where('user_id', Auth::user()->id)
                            ->where('jenis_formulir_id', $jenisFormulir->id)
                            ->first();
    	return view('backend.pendaftar.formulir.index',compact('formulirPembayaran','jenisFormulir','formulir'));
    }

    public function formulir_store(Request $request)
    {
        DB::beginTransaction();
        try 
        {
            if($request->nama_panggilan == null)
            {
                return $this->_responseData(500, "nama_panggilan tidak boleh kosong", null);
            }

            if($request->nisn == null)
            {
                return $this->_responseData(500, "nisn tidak boleh kosong", null);
            }

            if($request->asal_daerah_sekolah == null)
            {
                return $this->_responseData(500, "asal_daerah_sekolah tidak boleh kosong", null);
            }

            if($request->pilihan_pertama == null)
            {
                return $this->_responseData(500, "pilihan_pertama tidak boleh kosong", null);
            }

            if($request->pilihan_kedua == null)
            {
                return $this->_responseData(500, "pilihan_kedua tidak boleh kosong", null);
            }

            if($request->pilihan_ketiga == null)
            {
                return $this->_responseData(500, "pilihan_ketiga tidak boleh kosong", null);
            }

            if($request->kewarganegaraan == null)
            {
                return $this->_responseData(500, "kewarganegaraan tidak boleh kosong", null);
            }

            if($request->anak_ke == null)
            {
                return $this->_responseData(500, "anak_ke tidak boleh kosong", null);
            }

            if($request->bahasa == null)
            {
                return $this->_responseData(500, "bahasa tidak boleh kosong", null);
            }

            if($request->nama_orangtua_atau_wali == null)
            {
                return $this->_responseData(500, "nama_orangtua_atau_wali tidak boleh kosong", null);
            }

            if($request->no_hp_orangtua_atau_wali == null)
            {
                return $this->_responseData(500, "no_hp_orangtua_atau_wali tidak boleh kosong", null);
            }

            if($request->tinggal == null)
            {
                return $this->_responseData(500, "tinggal tidak boleh kosong", null);
            }

            if($request->jarak_tempat_tinggal == null)
            {
                return $this->_responseData(500, "jarak_tempat_tinggal tidak boleh kosong", null);
            }

            if($request->kesekolah_dengan == null)
            {
                return $this->_responseData(500, "kesekolah_dengan tidak boleh kosong", null);
            }

            if($request->keterangan_kesehatan == null)
            {
                return $this->_responseData(500, "keterangan_kesehatan tidak boleh kosong", null);
            }

            if($request->penyakit_yg_pernah_diderita == null)
            {
                return $this->_responseData(500, "penyakit_yg_pernah_diderita tidak boleh kosong", null);
            }

            if($request->ekskul_yg_diminati_2 == null)
            {
                return $this->_responseData(500, "ekskul_yg_diminati tidak boleh kosong", null);
            }

            if($request->dari_berapa_bersaudara == null)
            {
                return $this->_responseData(500, "dari_berapa_bersaudara tidak boleh kosong", null);
            }

            $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
            $request['ekskul_yg_diminati'] = implode(",",$request->ekskul_yg_diminati_2);
            $request['user_id'] = Auth::user()->id;
            $request['jenis_formulir_id'] = $jenisFormulir->id;

            $cek  = Formulir::where('user_id', $request['user_id'])
                            ->where('jenis_formulir_id', $request['jenis_formulir_id'])
                            ->first();

            if($cek == null)
            {
                Formulir::create($request->all());
            }
            else
            {
                $cek->update($request->all());
            }
            DB::commit();
            return $this->_responseData(0, "Sukses Mengisi Formulir Calon Siswa", null);
            
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }

    public function uang_pangkal_index()
    {
        $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
        $formulirPembayaran = FormulirPembayaran::where('user_id',Auth::user()->id)
                                                ->where('jenis_formulir_id',$jenisFormulir->id)
                                                ->first();
        $formulir  = Formulir::where('user_id', Auth::user()->id)
                            ->where('jenis_formulir_id', $jenisFormulir->id)
                            ->first();
        $uangPangkal  = UangPangkal::where('user_id', Auth::user()->id)
                            ->where('jenis_formulir_id', $jenisFormulir->id)
                            ->first();

        return view('backend.pendaftar.uang-pangkal.index',compact('formulir','jenisFormulir','formulirPembayaran','uangPangkal'));
    }

    public function uang_pangkal_store(Request $request)
    {
        $this->validate($request, [
            'jumlah_cicilan' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
        DB::beginTransaction();
        try 
        {
            $cek  = UangPangkal::where('user_id', Auth::user()->id)
                            ->where('jenis_formulir_id', $jenisFormulir->id)
                            ->first();

            $path = $request->file('bukti_pembayaran')->store('bukti_uang_pangkal');
            if($cek == null)
            {
                UangPangkal::create([
                    'user_id' => Auth::user()->id,
                    'jenis_formulir_id' => $jenisFormulir->id,
                    'cicilan_1_jumlah' => str_replace(".", "", $request->jumlah_cicilan),
                    'cicilan_1_bukti' => $path,
                    'cicilan_1_status' => "Menunggu Konfirmasi Admin",
                    'cicilan_1_tanggal' => date('Y-m-d H:i:s')
                ]);
            }
            else
            {
                if($request->cicilan == "1")
                {
                    $cek->update([
                        'cicilan_1_jumlah' => str_replace(".", "", $request->jumlah_cicilan),
                        'cicilan_1_bukti' => $path,
                        'cicilan_1_status' => "Menunggu Konfirmasi Admin",
                        'cicilan_1_tanggal' => date('Y-m-d H:i:s')
                    ]);
                }
                else if($request->cicilan == "2")
                {
                    $cek->update([
                        'cicilan_2_jumlah' => str_replace(".", "", $request->jumlah_cicilan),
                        'cicilan_2_bukti' => $path,
                        'cicilan_2_status' => "Menunggu Konfirmasi Admin",
                        'cicilan_2_tanggal' => date('Y-m-d H:i:s')
                    ]);
                }
                else if($request->cicilan == "3")
                {
                    $cek->update([
                        'cicilan_3_jumlah' => str_replace(".", "", $request->jumlah_cicilan),
                        'cicilan_3_bukti' => $path,
                        'cicilan_3_status' => "Menunggu Konfirmasi Admin",
                        'cicilan_3_tanggal' => date('Y-m-d H:i:s')
                    ]);
                }
            }

            DB::commit();
            toast('Berhasil Mengupload Bukti Pembayaran Uang Pangkal','success','top-right');
            return redirect()->back();
        }
        catch (Exception $e) 
        {
            DB::rollback();
            toast('Gagal Mengupload Bukti Pembayaran Uang Pangkal','error','top-right');
            return redirect()->back();
        } 
    }

    public function pemberkasan_index()
    {
        $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
        $uangPangkal  = UangPangkal::where('user_id', Auth::user()->id)
                            ->where('jenis_formulir_id', $jenisFormulir->id)
                            ->first();
        $pemberkasan = Pemberkasan::where('user_id', Auth::user()->id)
                          ->where('jenis_formulir_id', $jenisFormulir->id)
                          ->first();
        return view('backend.pendaftar.pemberkasan.index',compact('jenisFormulir','uangPangkal','pemberkasan'));
    }

    public function pemberkasan_store(Request $request)
    {
        $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
        $this->validate($request, [
            'ijazah_pdf' => 'required|mimes:pdf',
            'pas_foto_2_3' => 'required|image|mimes:jpg,jpeg',
            'pas_foto_3_4' => 'required|image|mimes:jpg,jpeg',
            'kk' => 'required|image|mimes:jpg,jpeg',
            'akte_kelahiran' => 'required|image|mimes:jpg,jpeg',
            'ukuran_baju' => 'required',
        ]);

        $ijazah_pdf_real = $request->file('ijazah_pdf')->store('pemberkasan_ijazah');
        $pas_foto_2_3_real = $request->file('pas_foto_2_3')->store('pemberkasan_pas_foto_2_3');
        $pas_foto_3_4_real = $request->file('pas_foto_3_4')->store('pemberkasan_pas_foto_3_4');
        $kk_real = $request->file('kk')->store('pemberkasan_kk');
        $akte_kelahiran_real = $request->file('akte_kelahiran')->store('pemberkasan_akte_kelahiran');

        $cek = Pemberkasan::where('user_id', Auth::user()->id)
                          ->where('jenis_formulir_id', $jenisFormulir->id)
                          ->first();

        if($cek == null)
        {
            Pemberkasan::create([
                'user_id' => Auth::user()->id,
                'jenis_formulir_id' => $jenisFormulir->id,
                'ijazah_pdf' => $ijazah_pdf_real,
                'pas_foto_2_3' => $pas_foto_2_3_real,
                'pas_foto_3_4' => $pas_foto_3_4_real,
                'kk' => $kk_real,
                'akte_kelahiran' => $akte_kelahiran_real,
                'ukuran_baju' => $request->ukuran_baju,
            ]);
        }
        else
        {
            $cek->update([
                'ijazah_pdf' => $ijazah_pdf_real,
                'pas_foto_2_3' => $pas_foto_2_3_real,
                'pas_foto_3_4' => $pas_foto_3_4_real,
                'kk' => $kk_real,
                'akte_kelahiran' => $akte_kelahiran_real,
                'ukuran_baju' => $request->ukuran_baju,
            ]);

            toast('Successfully Upload Pemberkasan','success','top-right');
            return redirect()->back();
        }
    }

    public function formulir_kwitansi()
    {
        $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
        $formulirPembayaran = FormulirPembayaran::where('user_id',Auth::user()->id)
                                                ->where('jenis_formulir_id',$jenisFormulir->id)
                                                ->first();
        $sekolah = Aplikasi::first();
        $userAdmin = User::where('role','Admin')->orderBy('id','asc')->first();
        $customPaper = array(0,0,580,300);
        $pdf        = PDF::loadView('backend.pendaftar.formulir-pembayaran.kwitansi',compact('jenisFormulir','formulirPembayaran','sekolah','userAdmin'))->setPaper($customPaper);
        return $pdf->stream();
    }

    public function uang_pangkal_kwitansi($cicilan)
    {
        $jenisFormulir = JenisFormulir::where('status', 'aktif')->first();
        $uangPangkal  = UangPangkal::where('user_id', Auth::user()->id)
                            ->where('jenis_formulir_id', $jenisFormulir->id)
                            ->first();

        $sekolah = Aplikasi::first();
        $userAdmin = User::where('role','Admin')->orderBy('id','asc')->first();
        $customPaper = array(0,0,580,300);


        if($cicilan == 1)
        {
            if($uangPangkal->cicilan_1_status == "Diterima")
            {
                $uangSejumlah = $uangPangkal->cicilan_1_jumlah;
                $untukPembayaran = "Uang Pangkal Cicilan 1";
                $tanggal = $uangPangkal->cicilan_1_tanggal;
                
                $totalCicilanDiterima = 0;
                if($uangPangkal->cicilan_1_status == "Diterima")
                {
                  $totalCicilanDiterima += $uangPangkal->cicilan_1_jumlah;
                }

                $totalSisa = $uangPangkal->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
                $sisaPembayaran =$totalSisa;
            }
            else
            {
                abort(404);
            }
            
        }
        else if($cicilan == 2)
        {
            if($uangPangkal->cicilan_2_status == "Diterima")
            {
                $uangSejumlah = $uangPangkal->cicilan_2_jumlah;
                $untukPembayaran = "Uang Pangkal Cicilan 2";
                $tanggal = $uangPangkal->cicilan_2_tanggal;
                
                $totalCicilanDiterima = 0;
                if($uangPangkal->cicilan_1_status == "Diterima")
                {
                  $totalCicilanDiterima += $uangPangkal->cicilan_1_jumlah;
                }
                if($uangPangkal->cicilan_2_status == "Diterima")
                {
                  $totalCicilanDiterima += $uangPangkal->cicilan_2_jumlah;
                }

                $totalSisa = $uangPangkal->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
                $sisaPembayaran =$totalSisa;
            }
            else
            {
                abort(404);
            }
        }
        else if($cicilan == 3)
        {
            if($uangPangkal->cicilan_3_status == "Diterima")
            {
                $uangSejumlah = $uangPangkal->cicilan_3_jumlah;
                $untukPembayaran = "Uang Pangkal Cicilan 3";
                $tanggal = $uangPangkal->cicilan_3_tanggal;
                
                $totalCicilanDiterima = 0;
                if($uangPangkal->cicilan_1_status == "Diterima")
                {
                  $totalCicilanDiterima += $uangPangkal->cicilan_1_jumlah;
                }
                if($uangPangkal->cicilan_2_status == "Diterima")
                {
                  $totalCicilanDiterima += $uangPangkal->cicilan_2_jumlah;
                }
                if($uangPangkal->cicilan_3_status == "Diterima")
                {
                  $totalCicilanDiterima += $uangPangkal->cicilan_3_jumlah;
                }

                $totalSisa = $uangPangkal->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
                $sisaPembayaran =$totalSisa;
            }
            else
            {
                abort(404);
            }
        }
        else
        {
            abort(404);
        }

        $pdf        = PDF::loadView('backend.pendaftar.uang-pangkal.kwitansi',compact('uangSejumlah','untukPembayaran','tanggal','sisaPembayaran','sekolah','userAdmin'))->setPaper($customPaper);
        return $pdf->stream();
    }
}

