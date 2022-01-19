<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\JenisFormulir;
use DataTables;
use DB;
use Excel;
use App\Helpers\LogAktivity;
use Auth;

class PendaftarController extends Controller
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
    	return DataTables::of(User::where('role','pendaftar')->where('jenis_formulir_id',$jenisFormulir->id)->orderBy('id','DESC')->get())
    		   			    ->addIndexColumn()
    		   			    ->addColumn('checkBox', function($data) {
			                    return "<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' name='checkedItem[]' id='customCheck{$data->id}' value='{$data->id}'><label class='custom-control-label' for='customCheck{$data->id}'></label></div>";
			                })
                            ->addColumn('action', function($data) {
			                    return "<a href=".url('admin/pendaftar/reset-password',$data->id)." class='text-white btn-sm btn-danger' id='btnResetPassword' data-toggle='tooltip' data-placement='bottom'>Reset</a>";
			                })
    		   			    ->rawColumns(['checkBox','action'])
                		    ->make(true);
    }

    public function index()
    {
        return view('backend.admin.pendaftar.index');
    }

    public function reset_password($id)
    {
    	DB::beginTransaction();
        try 
        {
            $data = User::findOrFail($id);
            $data->update([
            	'password' => bcrypt('123456')
            ]);
            DB::commit();
            LogAktivity::addToLog(Auth::user()->name.' mereset password '.$data->name);
            return $this->_responseData(0, "Successfully Reset Password", $data);
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }

    public function deleteSelected(Request $request)
    {
        DB::beginTransaction();
        try 
        {
            LogAktivity::addToLog(Auth::user()->name.' Menghapus User '. implode(", ", $request->checkedItem));
            $data = User::whereIn('id', $request->checkedItem)->delete();
            DB::commit();
            return $this->_responseData(0, "Successfully Deleted Data", $data);
        }
        catch (Exception $e) 
        {
            DB::rollback();
            return $this->_responseData(500, $e->getMessage(), null);
        }
    }

    public function exportExcel()
    {
        $jenisFormulir = JenisFormulir::where('status','aktif')->first();
        $dataReal = User::where('role','pendaftar')->where('jenis_formulir_id',$jenisFormulir->id)->get();
        $namaFile = "pendaftar_".$jenisFormulir->nama;
       
        $i                          = 1;
        $no                          = 1;
        foreach ($dataReal as $row) {
            $data[$i]   =   
            array(
                'no'   => $no++,
                'nama' => $row->name,
                'email' => $row->email, 
                'username' => $row->username,
                'telepon' => $row->telepon,
                'tempat_tanggal_lahir' => $row->tempat_tanggal_lahir,
                'jenis_kelamin' => $row->jenis_kelamin,
                'agama' => $row->agama,
                'asal_sekolah' => $row->asal_sekolah,
                'alamat_rumah' => $row->alamat_rumah,
            );
            $i++;
        }

        $export         = Excel::create($namaFile, function($excel) use($data){
            $excel->sheet('Pendaftar Siswa', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }
}
