<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\JenisFormulir;
use DB;

class PpdbController extends Controller
{
	public function index()
	{
    return view('frontend.ppdb');
	}

	public function store(Request $request)
	{
		DB::beginTransaction();
        try 
        {
        	if($request->username == null || 
        	   $request->email == null || 
        	   $request->password == null ||
        	   $request->name == null ||
        	   $request->telepon == null ||
        	   $request->tempat_tanggal_lahir == null ||
        	   $request->jenis_kelamin == null ||
        	   $request->agama == null ||
        	   $request->asal_sekolah == null ||
        	   $request->alamat_rumah == null
        	  )
            {
                $errorCode = 500;
                $message   = "Data Tidak Boleh Kosong.";
            }
            else
            {
            	// cek formulir
            	$cekFormulir = JenisFormulir::where('status','aktif')->first();
            	if($cekFormulir == null)
            	{
            		$errorCode = 500;
                	$message   = "Ups Formulir Pendaftaran Tidak Ada yg aktif.";
            	}
            	else
            	{	
            		$cekUserEmail = User::where('email', $request->email)->first();
            		if($cekUserEmail != null)
            		{
            			$errorCode = 500;
                		$message   = "Email Sudah Terdaftar.";
            		}
            		else
            		{
            			$cekUserName = User::where('username', $request->username)->first();
	            		if($cekUserName != null)
	            		{
	            			$errorCode = 500;
	                		$message   = "UserName Sudah Terdaftar.";
	            		}
	            		else 
	            		{
	            			// membuat akun
		            		$request['role'] 			  = "Pendaftar";
		            		$request['jenis_formulir_id'] = $cekFormulir->id;
		            		$request['password'] 		  = bcrypt($request['password']);
		            		$create = User::create($request->all());
		            		DB::commit();
		            		$errorCode = 0;
		                	$message   = "Silahkan Login Untuk Membeli Formulir";
	            		}
            		}
            	}	
            }

            $data = [
                "ErrorCode" => $errorCode,
                "Message"   => $message,
            ];
        }
        catch (Exception $e) 
        {
            DB::rollback();
            $data = [
                "ErrorCode" => 500,
                "Message"   => $e,
            ];
        }
        return response()->json($data);
	}
}
