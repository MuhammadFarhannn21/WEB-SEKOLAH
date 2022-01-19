<?php

namespace App\Http\Controllers;
use App\JenisFormulir;
use Illuminate\Http\Request;
use DataTables;
use App\UangPangkal;

class UangPangkalController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	return view('backend.admin.uang-pangkal.index',compact('jenisFormulir'));
    }

    public function apiCicilan1()
    {
    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$dataCicilan   = UangPangkal::all();
    	return DataTables::of($dataCicilan)
    		   			    ->addIndexColumn()
			                ->addColumn('nama', function($data) {
			                    return $data->user->name;
			                })
			                ->addColumn('email', function($data) {
			                    return $data->user->email;
			                })
			                ->addColumn('tanggal', function($data) {
			                    return $data->cicilan_1_tanggal->format('d-m-Y H:i:s');
			                })
			                ->addColumn('status', function($data) {
			                	$status = '<span class="badge badge-info">'.$data->cicilan_1_status.'</span>';
			                	if($data->cicilan_1_status == "Diterima")
			                	{
			                		$status = '<span class="badge badge-success">'.$data->cicilan_1_status.'</span>';
			                	}
			                	elseif($data->cicilan_1_status == "Ditolak")
			                	{
			                		$status = '<span class="badge badge-danger">'.$data->cicilan_1_status.'</span>';
			                	}
			                    return $status;
			                })
			                ->addColumn('sisa', function($data) {
			                	$totalCicilanDiterima = 0;
			                	if($data->cicilan_1_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_1_jumlah;
			                	}
			                	if($data->cicilan_2_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_2_jumlah;
			                	}
			                	if($data->cicilan_3_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_3_jumlah;
			                	}

			                	$totalSisa = $data->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
			                    return number_format($totalSisa);
			                })
			                ->addColumn('cicilan', function($data) {
			                    return number_format($data->cicilan_1_jumlah);
			                })
			                ->addColumn('bukti_pembayaran', function($data) {
			                    return '<a target="blank" href='.asset($data->cicilan_1_bukti).'><img src='.asset($data->cicilan_1_bukti).' width="50" height="50"></a>';
			                })
                            ->addColumn('action', function ($data) {
                                return view('backend.layouts.component.pembayaran_action_cicilan1', [
                                    'data'   => $data,
                                    'diterima'   => url("admin/pembayaran-uang-pangkal/cicilan1/diterima/".$data->id),
                                    'ditolak' => url("admin/pembayaran-uang-pangkal/cicilan1/ditolak/".$data->id)
                                ]);
                            })
    		   			    ->rawColumns(['checkBox','action','bukti_pembayaran','status'])
                		    ->make(true);
    }

    public function apiCicilan2()
    {
    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$dataCicilan   = UangPangkal::where('cicilan_2_jumlah','!=', null)->get();
    	return DataTables::of($dataCicilan)
    		   			    ->addIndexColumn()
			                ->addColumn('nama', function($data) {
			                    return $data->user->name;
			                })
			                ->addColumn('email', function($data) {
			                    return $data->user->email;
			                })
			                ->addColumn('tanggal', function($data) {
			                    return $data->cicilan_2_tanggal->format('d-m-Y H:i:s');
			                })
			                ->addColumn('status', function($data) {
			                	$status = '<span class="badge badge-info">'.$data->cicilan_2_status.'</span>';
			                	if($data->cicilan_2_status == "Diterima")
			                	{
			                		$status = '<span class="badge badge-success">'.$data->cicilan_2_status.'</span>';
			                	}
			                	elseif($data->cicilan_2_status == "Ditolak")
			                	{
			                		$status = '<span class="badge badge-danger">'.$data->cicilan_2_status.'</span>';
			                	}
			                    return $status;
			                })
			                ->addColumn('sisa', function($data) {
			                    $totalCicilanDiterima = 0;
			                	if($data->cicilan_1_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_1_jumlah;
			                	}
			                	if($data->cicilan_2_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_2_jumlah;
			                	}
			                	if($data->cicilan_3_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_3_jumlah;
			                	}

			                	$totalSisa = $data->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
			                    return number_format($totalSisa);
			                })
			                ->addColumn('cicilan', function($data) {
			                    return number_format($data->cicilan_2_jumlah);
			                })
			                ->addColumn('bukti_pembayaran', function($data) {
			                    return '<a target="blank" href='.asset($data->cicilan_2_bukti).'><img src='.asset($data->cicilan_2_bukti).' width="50" height="50"></a>';
			                })
                            ->addColumn('action', function ($data) {
                                return view('backend.layouts.component.pembayaran_action_cicilan2', [
                                    'data'   => $data,
                                    'diterima'   => url("admin/pembayaran-uang-pangkal/cicilan2/diterima/".$data->id),
                                    'ditolak' => url("admin/pembayaran-uang-pangkal/cicilan2/ditolak/".$data->id)
                                ]);
                            })
    		   			    ->rawColumns(['checkBox','action','bukti_pembayaran','status'])
                		    ->make(true);
    }

    public function apiCicilan3()
    {
    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$dataCicilan   = UangPangkal::where('cicilan_3_jumlah','!=', null)->get();
    	return DataTables::of($dataCicilan)
    		   			    ->addIndexColumn()
			                ->addColumn('nama', function($data) {
			                    return $data->user->name;
			                })
			                ->addColumn('email', function($data) {
			                    return $data->user->email;
			                })
			                ->addColumn('tanggal', function($data) {
			                    return $data->cicilan_3_tanggal->format('d-m-Y H:i:s');
			                })
			                ->addColumn('status', function($data) {
			                	$status = '<span class="badge badge-info">'.$data->cicilan_3_status.'</span>';
			                	if($data->cicilan_3_status == "Diterima")
			                	{
			                		$status = '<span class="badge badge-success">'.$data->cicilan_3_status.'</span>';
			                	}
			                	elseif($data->cicilan_3_status == "Ditolak")
			                	{
			                		$status = '<span class="badge badge-danger">'.$data->cicilan_3_status.'</span>';
			                	}
			                    return $status;
			                })
			                ->addColumn('sisa', function($data) {
			                    $totalCicilanDiterima = 0;
			                	if($data->cicilan_1_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_1_jumlah;
			                	}
			                	if($data->cicilan_2_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_2_jumlah;
			                	}
			                	if($data->cicilan_3_status == "Diterima")
			                	{
			                		$totalCicilanDiterima += $data->cicilan_3_jumlah;
			                	}

			                	$totalSisa = $data->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
			                    return number_format($totalSisa);
			                })
			                ->addColumn('cicilan', function($data) {
			                    return number_format($data->cicilan_3_jumlah);
			                })
			                ->addColumn('bukti_pembayaran', function($data) {
			                    return '<a target="blank" href='.asset($data->cicilan_3_bukti).'><img src='.asset($data->cicilan_3_bukti).' width="50" height="50"></a>';
			                })
                            ->addColumn('action', function ($data) {
                                return view('backend.layouts.component.pembayaran_action_cicilan3', [
                                    'data'   => $data,
                                    'diterima'   => url("admin/pembayaran-uang-pangkal/cicilan3/diterima/".$data->id),
                                    'ditolak' => url("admin/pembayaran-uang-pangkal/cicilan3/ditolak/".$data->id)
                                ]);
                            })
    		   			    ->rawColumns(['checkBox','action','bukti_pembayaran','status'])
                		    ->make(true);
    }

    public function terimaCicilan1($id)
    {

    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$uangPangkal = UangPangkal::findOrFail($id);
    	if($uangPangkal->cicilan_1_status != "Diterima")
    	{
	    	$uangPangkal->update([
	    		'cicilan_1_status' => 'Diterima'
	    	]);
    	}
    	
    	return $this->_responseData(0, "Successfully Konfirmasi Data", null);
    }

    public function tolakCicilan1($id)
    {

    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$uangPangkal = UangPangkal::findOrFail($id);
    	if($uangPangkal->cicilan_1_status != "Ditolak")
    	{
	    	$uangPangkal->update([
	    		'cicilan_1_status' => 'Ditolak'
	    	]);
    	}
    	
    	return $this->_responseData(0, "Successfully Konfirmasi Data", null);
    }

    public function terimaCicilan2($id)
    {

    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$uangPangkal = UangPangkal::findOrFail($id);
    	if($uangPangkal->cicilan_2_status != "Diterima")
    	{
	    	$uangPangkal->update([
	    		'cicilan_2_status' => 'Diterima'
	    	]);
    	}
    	
    	return $this->_responseData(0, "Successfully Konfirmasi Data", null);
    }

    public function tolakCicilan2($id)
    {

    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$uangPangkal = UangPangkal::findOrFail($id);
    	if($uangPangkal->cicilan_2_status != "Ditolak")
    	{
	    	$uangPangkal->update([
	    		'cicilan_2_status' => 'Ditolak'
	    	]);
    	}
    	
    	return $this->_responseData(0, "Successfully Konfirmasi Data", null);
    }

    public function terimaCicilan3($id)
    {

    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$uangPangkal = UangPangkal::findOrFail($id);
    	if($uangPangkal->cicilan_3_status != "Diterima")
    	{
    		$sisa = $jenisFormulir->biaya_uang_pangkal - $uangPangkal->cicilan_3_jumlah;
	    	$uangPangkal->update([
	    		'cicilan_3_status' => 'Diterima'
	    	]);
    	}
    	
    	return $this->_responseData(0, "Successfully Konfirmasi Data", null);
    }

    public function tolakCicilan3($id)
    {

    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$uangPangkal = UangPangkal::findOrFail($id);
    	if($uangPangkal->cicilan_3_status != "Ditolak")
    	{
	    	$uangPangkal->update([
	    		'cicilan_3_status' => 'Ditolak'
	    	]);
    	}
    	
    	return $this->_responseData(0, "Successfully Konfirmasi Data", null);
    }

    public function laporan(Request $request)
    {
        $jenisFormulir = JenisFormulir::where('status','aktif')->first();
        $data = UangPangkal::where('jenis_formulir_id',$jenisFormulir->id)->get();
        return view('backend.admin.uang-pangkal.laporan',compact('jenisFormulir','data'));
    }

    public function laporanExcel(Request $request)
    {
        $jenisFormulir = JenisFormulir::where('status','aktif')->first();
        $data = UangPangkal::where('jenis_formulir_id',$jenisFormulir->id)->get();
        return view('backend.admin.uang-pangkal.excel',compact('jenisFormulir','data'));
    }
    
}
