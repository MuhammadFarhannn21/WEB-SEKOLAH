<?php

namespace App\Http\Controllers;

use Auth;
use App\Aplikasi;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class AplikasiController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    // bagian halaman index
    public function index(){
    	$aplikasi = Aplikasi::first();
    	return view('backend.admin.aplikasi.index',compact('aplikasi'));
    }

    // bagian mengupdate / create data
    public function store(Request $request)
    {
        Aplikasi::updateOrCreate([
            'id'        => 1
        ], $request->all());

        LogAktivity::addToLog(Auth::user()->name.' Mengedit Konfigurasi Aplikasi');
        toast('Berhasil Mengedit Data','success','top-right');
        return redirect()->back();
    }
}
