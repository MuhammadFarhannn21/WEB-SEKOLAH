<?php

namespace App\Http\Controllers;

use Auth;
use App\Jurusan;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;


class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    
    public function index(){
    	$jurusan = Jurusan::orderBy('id','DESC')->get();
    	return view('backend.admin.jurusan.index',compact('jurusan'));
    }

    public function create()
    {
        $jurusan = null;
    	return view('backend.admin.jurusan.create',compact('jurusan'));
    }

    public function store(Request $request)
    {
    $this->validate($request, [
        'judul'      => 'required',
        'sub_judul'  => 'required',
        'keterangan' => 'required',
    ]);
    Jurusan::create($request->all());
    LogAktivity::addToLog(Auth::user()->name.' Membuat Jurusan '.$request['judul']);
    toast('Berhasil Membuat Jurusan','success','top-right');
    return redirect()->back();
    }

    // bagian edit data
    public function edit($id){
        $jurusan = Jurusan::findOrFail($id);
        return view('backend.admin.jurusan.edit',compact('jurusan'));
    }

    // bagian update data
    public function update(Request $request, $id)
{
    $jurusan = Jurusan::findOrFail($id);
    $this->validate($request, [
        'judul'      => 'required',
        'sub_judul'  => 'required',
        'keterangan' => 'required',
    ]);
    $jurusan->update($request->all());
    LogAktivity::addToLog(Auth::user()->name.' Mengupdate jurusan '.$jurusan->judul);
    toast('Berhasil Mengupdate Data','success','top-right');
    return redirect()->back();
}

    // bagian menghapus data
    public function delete($id){
        $jurusan = Jurusan::findOrFail($id);
        LogAktivity::addToLog(Auth::user()->name.' Menghapus Jurusan '.$jurusan->judul);
        $jurusan->delete();
        toast('Berhasil Menghapus Jurusan','success','top-right');
        return redirect()->back();
    }
}
