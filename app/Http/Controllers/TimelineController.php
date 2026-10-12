<?php

namespace App\Http\Controllers;

use Auth;
use App\Timeline;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class TimelineController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

	// bagian halaman index
    public function index(){
    	$data = Timeline::all();
    	return view('backend.admin.timeline.index',compact('data'));
    }

    // bagian menyimpan data ke database
    public function store(Request $request){
    $data = $request->all();
    $data['body'] = $request->body ?? '-';
    $timeline = Timeline::create($data);
    LogAktivity::addToLog(Auth::user()->name.' Membuat Timeline '.$timeline->judul);
    toast('Berhasil Menyimpan Data','success','top-right');
    return redirect()->back();
    }

    // bagian edit data
    public function edit($id){
    	$timeline = Timeline::findOrFail($id);
    	return view('backend.admin.timeline.edit',compact('timeline'));
    }

    // bagian update data
    public function update(Request $request,$id){
        $timeline = Timeline::findOrFail($id);
        $timeline->update($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Mengupdate Timeline '.$timeline->judul);
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }
    
    // bagian menghapus data
    public function delete($id){
    	$timeline = Timeline::findOrFail($id);
    	LogAktivity::addToLog(Auth::user()->name.' Menghapus Timeline '.$timeline->judul);
    	$timeline->delete();
    	toast('Berhasil Menghapus timeline','success','top-right');
        return redirect()->back();
    }
}
