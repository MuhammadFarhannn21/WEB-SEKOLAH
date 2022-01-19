<?php

namespace App\Http\Controllers;

use App\JenisFormulir;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;
use DataTables;
use DB;
use Auth;

class JenisFormulirController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function api()
    {
    	return DataTables::of(JenisFormulir::orderBy('id','DESC')->get())
    		   			    ->addIndexColumn()
    		   			    ->addColumn('checkBox', function($data) {
			                    return "<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' name='checkedItem[]' id='customCheck{$data->id}' value='{$data->id}'><label class='custom-control-label' for='customCheck{$data->id}'></label></div>";
			                })
                            ->addColumn('action', function ($data) {
                                return view('backend.layouts.component.action', [
                                    'data'   => $data,
                                    'edit'   => url("admin/jenis-formulir/edit/".$data->id),
                                    'delete' => url("admin/jenis-formulir/delete/".$data->id)
                                ]);
                            })
    		   			    ->rawColumns(['checkBox', 'action'])
                		    ->make(true);
    }

    public function index()
    {
        return view('backend.admin.jenis-formulir.index');
    }

    public function create()
    {
        $url = "admin/jenis-formulir/create";
        $action = "createForm";
        return view('backend.admin.jenis-formulir.form',compact('url','action'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try 
        {
            if($request->status == "aktif")
            {
                if(JenisFormulir::where('status','aktif')->count() > 0)
                {
                    DB::rollback();
                    return $this->_responseData(500, "Ups Data JenisFormulir Yg Berstatus Aktif Sudah Ada", null);
                }
                else
                {
                    $data = JenisFormulir::create($request->all());
                    DB::commit();
                    LogAktivity::addToLog(Auth::user()->name.' Membuat JenisFormulir '.$data->nama);
                    return $this->_responseData(0, "Successfully Created Data", $data);
                }
            }
            else
            {
                $data = JenisFormulir::create($request->all());
                DB::commit();
                LogAktivity::addToLog(Auth::user()->name.' Membuat JenisFormulir '.$data->nama);
                return $this->_responseData(0, "Successfully Created Data", $data);
            }
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }

    public function edit($id)
    {
        $url = "admin/jenis-formulir/edit/".$id;
        $action = "editForm";
        $data = JenisFormulir::findOrFail($id);
        return view('backend.admin.jenis-formulir.form',compact('data', 'url','action'));
    }

    public function update(Request $request,$id)
    {
        DB::beginTransaction();
        try 
        {
            if($request->status == "aktif")
            {
                if(JenisFormulir::where('status','aktif')->where('id','!=',$id)->count() > 0)
                {
                    DB::rollback();
                    return $this->_responseData(500, "Ups Data JenisFormulir Yg Berstatus Aktif Sudah Ada", null);
                }
                else
                {
                    $data = JenisFormulir::findOrFail($id);
                    $data->update($request->all());
                    DB::commit();
                    LogAktivity::addToLog(Auth::user()->name.' Mengedit JenisFormulir '.$data->nama);
                    return $this->_responseData(0, "Successfully Edit Data", $data);
                }
            }
            else
            {
                $data = JenisFormulir::findOrFail($id);
                $data->update($request->all());
                DB::commit();
                LogAktivity::addToLog(Auth::user()->name.' Mengedit JenisFormulir '.$data->nama);
                return $this->_responseData(0, "Successfully Edit Data", $data);
            }
            
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try 
        {
            $data = JenisFormulir::findOrFail($id);
            LogAktivity::addToLog(Auth::user()->name.' Menghapus JenisFormulir Id'.$data->nama);
            $data->delete();
            DB::commit();
            return $this->_responseData(0, "Successfully Deleted Data", $data);
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }

    // Bagian Delete Selected
    public function deleteSelected(Request $request)
    {
        DB::beginTransaction();
        try 
        {
            LogAktivity::addToLog(Auth::user()->name.' Menghapus JenisFormulir '. implode(", ", $request->checkedItem));
            $data = JenisFormulir::whereIn('id', $request->checkedItem)->delete();
            DB::commit();
            return $this->_responseData(0, "Successfully Deleted Data", $data);
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }
}
