<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Auth;
use App\Pemberkasan;
use App\JenisFormulir;

class PemberkasanController extends Controller
{
    public function index()
    {
    	return view('backend.admin.pemberkasan.index');
    }

    public function api()
    {
    	$jenisFormulir = JenisFormulir::where('status','aktif')->first();
    	$data = Pemberkasan::where('jenis_formulir_id',$jenisFormulir->id)->get();
    	return DataTables::of($data)
    		   			    ->addIndexColumn()
                            ->addColumn('nama', function($data) {
                                return $data->user->name;
                            })
                            ->addColumn('email', function($data) {
                                return $data->user->email;
                            })
                            ->addColumn('ijazah', function($data) {
                                return '<a target="blank" href='.asset($data->ijazah_pdf).'>Lihat</a>';
                            })
                            ->addColumn('pas_foto_2_3', function($data) {
                                return '<a target="blank" href='.asset($data->pas_foto_2_3).'><img src='.asset($data->pas_foto_2_3).' width="50px" heigth="50px"></a>';
                            })
                            ->addColumn('pas_foto_3_4', function($data) {
                                return '<a target="blank" href='.asset($data->pas_foto_3_4).'><img src='.asset($data->pas_foto_3_4).' width="50px" heigth="50px"></a>';
                            })
                            ->addColumn('kk', function($data) {
                                return '<a target="blank" href='.asset($data->kk).'><img src='.asset($data->kk).' width="50px" heigth="50px"></a>';
                            })
                            ->addColumn('akte_kelahiran', function($data) {
                                return '<a target="blank" href='.asset($data->akte_kelahiran).'><img src='.asset($data->akte_kelahiran).' width="50px" heigth="50px"></a>';
                            })
                            ->rawColumns(['pas_foto_2_3','pas_foto_3_4','kk','akte_kelahiran','ijazah'])
                		    ->make(true);

    }

}
