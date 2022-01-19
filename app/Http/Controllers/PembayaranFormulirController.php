<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisFormulir;
use App\FormulirPembayaran;
use DataTables;
use DB;
use App\Helpers\LogAktivity;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;

class PembayaranFormulirController extends Controller
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
    	return DataTables::of(FormulirPembayaran::where('jenis_formulir_id',$jenisFormulir->id)->orderBy('id','DESC')->get())
    		   			    ->addIndexColumn()
    		   			    ->addColumn('checkBox', function($data) {
			                    return "<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' name='checkedItem[]' id='customCheck{$data->id}' value='{$data->id}'><label class='custom-control-label' for='customCheck{$data->id}'></label></div>";
			                })
			                ->addColumn('nama', function($data) {
			                    return $data->user == null ? "-" : $data->user->name;
			                })
			                ->addColumn('email', function($data) {
			                    return $data->user == null ? "-" :$data->user->email;
			                })
                            ->addColumn('telepon', function($data) {
                                return $data->user == null ? "-" :$data->user->telepon;
                            })
			                ->addColumn('asal_sekolah', function($data) {
			                    return $data->user == null ? "-" :$data->user->asal_sekolah;
			                })
			                ->addColumn('status', function($data) {
			                	$status = '<span class="badge badge-info">'.$data->status.'</span>';
			                	if($data->status == "Diterima")
			                	{
			                		$status = '<span class="badge badge-success">'.$data->status.'</span>';
			                	}
			                	elseif($data->status == "Ditolak")
			                	{
			                		$status = '<span class="badge badge-danger">'.$data->status.'</span>';
			                	}
			                    return $status;
			                })
			                ->addColumn('biaya', function($data) {
			                    return number_format($data->jenisFormulir->biaya_formulir);
			                })
			                ->addColumn('bukti_pembayaran', function($data) {
			                    return '<a target="blank" href='.asset($data->bukti_pembayaran).'><img src='.asset($data->bukti_pembayaran).' width="145"></a>';
			                })
			                ->addColumn('created_at', function($data) {
			                    return $data->created_at->format('d/m/Y h:i:s');
			                })
                            ->addColumn('action', function ($data) {
                                return view('backend.layouts.component.pembayaran_action', [
                                    'data'   => $data,
                                    'diterima'   => url("admin/pembayaran-formulir/diterima/".$data->id),
                                    'ditolak' => url("admin/pembayaran-formulir/ditolak/".$data->id)
                                ]);
                            })
    		   			    ->rawColumns(['checkBox','action','bukti_pembayaran','status'])
                		    ->make(true);
    }

    public function index()
    {
    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
        return view('backend.admin.pembayaran-formulir.index',compact('jenisFormulir'));
    }

    public function diterima($id)
    {
    	$data = FormulirPembayaran::findOrFail($id);
    	$data->update([
    		'status' => "Diterima"
    	]);

    	LogAktivity::addToLog(Auth::user()->name.' Menerima FormulirPembayaran '.$data->id);
    	return $this->_responseData(0, "Successfully Konfirmasi Data", $data);
    }

    public function ditolak($id)
    {
    	$data = FormulirPembayaran::findOrFail($id);
    	$data->update([
    		'status' => "Ditolak"
    	]);

    	LogAktivity::addToLog(Auth::user()->name.' Menolak FormulirPembayaran '.$data->id);
    	return $this->_responseData(0, "Data Berhasil Ditolak", $data);
    }

    public function diterimaSelected(Request $request)
    {
        DB::beginTransaction();
        try 
        {
            LogAktivity::addToLog(Auth::user()->name.' Menerima FormulirPembayaran Id '. implode(", ", $request->checkedItem));
            $data = FormulirPembayaran::whereIn('id', $request->checkedItem)->update([
            	'status' => "Diterima"
            ]);
            DB::commit();
            return $this->_responseData(0, "Successfully Konfirmasi Data", $data);
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }

    public function laporan(Request $request)
    {
        $jenisFormulir = JenisFormulir::where('status','aktif')->first();
        $data = FormulirPembayaran::where('jenis_formulir_id',$jenisFormulir->id)->where('status','Diterima')->get();
        return view('backend.admin.pembayaran-formulir.laporan',compact('jenisFormulir','data'));
    }

    public function laporanExcel(Request $request)
    {
        $jenisFormulir = JenisFormulir::where('status','aktif')->first();
        $data = FormulirPembayaran::where('jenis_formulir_id',$jenisFormulir->id)->where('status','Diterima')->get();
        return view('backend.admin.pembayaran-formulir.excel',compact('jenisFormulir','data'));
    }
}
