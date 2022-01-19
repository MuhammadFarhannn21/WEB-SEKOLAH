<?php

namespace App\Http\Controllers;

use Auth;
use App\Banner;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class BannerController extends Controller
{
	// bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

	// bagian halaman index
    public function index(){
    	$banners = Banner::all();
    	return view('backend.admin.banner.index',compact('banners'));
    }

    // bagian menyimpan data ke database
    public function store(Request $request){
    	$banner = Banner::create($request->all());
    	LogAktivity::addToLog(Auth::user()->name.' Membuat Banner '.$banner->judul);
    	toast('Berhasil Menyimpan Data','success','top-right');
        return redirect()->back();
    }

    // bagian edit data
    public function edit($id){
    	$banner = Banner::findOrFail($id);
    	return view('backend.admin.banner.edit',compact('banner'));
    }

    // bagian update data
    public function update(Request $request,$id){
        $banner = Banner::findOrFail($id);
        $banner->update($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Mengupdate Banner '.$banner->judul);
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }

    // bagian menghapus data
    public function delete($id){
    	$banner = Banner::findOrFail($id);
    	LogAktivity::addToLog(Auth::user()->name.' Menghapus Banner '.$banner->judul);
    	$banner->delete();
    	toast('Berhasil Menghapus Banner','success','top-right');
        return redirect()->back();
    }
}
