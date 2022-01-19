<?php

namespace App\Http\Controllers;

use Auth;
use App\Gallery;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class GalleryController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    // bagian halaman index
    public function index(){
        $data = Gallery::all();
        return view('backend.admin.gallery.index',compact('data'));
    }

    // bagian menyimpan data ke database
    public function store(Request $request){
        $gallery = Gallery::create($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Membuat Gallery '.$gallery->nama);
        toast('Berhasil Menyimpan Data','success','top-right');
        return redirect()->back();
    }

    // bagian edit data
    public function edit($id){
        $gallery = Gallery::findOrFail($id);
        return view('backend.admin.gallery.edit',compact('gallery'));
    }

    // bagian update data
    public function update(Request $request,$id){
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Mengupdate gallery '.$gallery->nama);
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }

    // bagian menghapus data
    public function delete($id){
        $gallery = Gallery::findOrFail($id);
        LogAktivity::addToLog(Auth::user()->name.' Menghapus gallery '.$gallery->nama);
        $gallery->delete();
        toast('Berhasil Menghapus gallery','success','top-right');
        return redirect()->back();
    }
}
