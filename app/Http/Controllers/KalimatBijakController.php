<?php

namespace App\Http\Controllers;

use Auth;
use App\KalimatBijak;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class KalimatBijakController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

	// bagian halaman index
    public function index(){
    	$data = KalimatBijak::all();
    	return view('backend.admin.kalimat.index',compact('data'));
    }

    // bagian menyimpan data ke database
    public function store(Request $request){
    	$kalimat = KalimatBijak::create($request->all());
    	LogAktivity::addToLog(Auth::user()->name.' Membuat KalimatBijak '.$kalimat->nama);
    	toast('Berhasil Menyimpan Data','success','top-right');
        return redirect()->back();
    }

    // bagian edit data
    public function edit($id){
    	$kalimat = KalimatBijak::findOrFail($id);
    	return view('backend.admin.kalimat.edit',compact('kalimat'));
    }

    // bagian update data
    public function update(Request $request,$id){
        $kalimat = KalimatBijak::findOrFail($id);
        $kalimat->update($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Mengupdate kalimat '.$kalimat->nama);
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }

    // bagian menghapus data
    public function delete($id){
    	$kalimat = KalimatBijak::findOrFail($id);
    	LogAktivity::addToLog(Auth::user()->name.' Menghapus KalimatBijak '.$kalimat->nama);
    	$kalimat->delete();
    	toast('Berhasil Menghapus KalimatBijak','success','top-right');
        return redirect()->back();
    }
}
