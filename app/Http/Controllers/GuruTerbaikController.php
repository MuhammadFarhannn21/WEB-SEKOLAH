<?php

namespace App\Http\Controllers;

use Auth;
use App\GuruTerbaik;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class GuruTerbaikController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

	// bagian halaman index
    public function index(){
    	$data = GuruTerbaik::all();
    	return view('backend.admin.guruterbaik.index',compact('data'));
    }

    // bagian menyimpan data ke database
    public function store(Request $request){
    	$guruterbaik = GuruTerbaik::create($request->all());
    	LogAktivity::addToLog(Auth::user()->name.' Membuat GuruTerbaik '.$guruterbaik->nama);
    	toast('Berhasil Menyimpan Data','success','top-right');
        return redirect()->back();
    }

    // bagian edit data
    public function edit($id){
    	$guruterbaik = GuruTerbaik::findOrFail($id);
    	return view('backend.admin.guruterbaik.edit',compact('guruterbaik'));
    }

    // bagian update data
    public function update(Request $request,$id){
        $guru = GuruTerbaik::findOrFail($id);
        $guru->update($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Mengupdate guru '.$guru->nama);
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }

    // bagian menghapus data
    public function delete($id){
    	$guruterbaik = GuruTerbaik::findOrFail($id);
    	LogAktivity::addToLog(Auth::user()->name.' Menghapus guruterbaik '.$guruterbaik->nama);
    	$guruterbaik->delete();
    	toast('guruterbaik Menghapus guruterbaik','success','top-right');
        return redirect()->back();
    }
}
