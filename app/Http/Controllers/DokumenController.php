<?php

namespace App\Http\Controllers;

use Auth;
use App\Dokumen;
use App\Category;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class DokumenController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
    	$posts = Dokumen::orderBy('id','DESC')->get();
		return view('backend.admin.dokumen.index',compact('posts'));
    }

    public function create()
    {
        $post = null;
    	return view('backend.admin.dokumen.create',compact('post'));
    }

    public function store(Request $request)
    {
        $path = $request->file('file')->store('dokumen');
        Dokumen::create([
            'judul'         => $request->judul,
            'file'          => $path,
        ]);
        LogAktivity::addToLog(Auth::user()->name.' Membuat Dokumens '.$request['slug']);
        toast('Berhasil Membuat Dokumens','success','top-right');
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Dokumen::findOrFail($id);
        return view('backend.admin.dokumen.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = Dokumen::findOrFail($id);
        $path = $request->file('file')->store('dokumen');
        $data->update([
            'judul'         => $request->judul,
            'file'          => $path,
        ]);
        
        toast('Berhasil Mengedit Dokumens','success','top-right');
        return redirect()->route('admin.dokumen.index');
    }

    public function delete($id)
    {
        $post = Dokumen::findOrFail($id);
        $post->delete();
        LogAktivity::addToLog(Auth::user()->name.' Menghapus Dokumens '.$post->slug);
        toast('Berhasil Menghapus Dokumens','success','top-right');
        return redirect()->back();
    }
}
