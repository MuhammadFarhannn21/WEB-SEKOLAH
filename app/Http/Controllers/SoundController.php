<?php

namespace App\Http\Controllers;

use Auth;
use App\Sound;
use App\Category;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class SoundController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
    	$posts = Sound::orderBy('id','DESC')->paginate(50);
		return view('backend.admin.sound.index',compact('posts'));
    }

    public function create()
    {
        $post = null;
    	return view('backend.admin.sound.create',compact('post'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'lirik'          => 'required|min:20',
            'status'        => 'required',
            'published_at'  => 'required'
        ]);
        $request['slug']    = str_slug($request->get('title'), '-');
        $request['user_id'] = $request->user()->id;

        if($request->file('file')) {
            $nama       = str_slug($request->get('judul'), '-');
            $file       = $request->file('file');
            $format     = $file->getClientOriginalExtension();
            $filename   = md5($nama).'.'.$format;
            $request->file('file')->move("file", $filename);
            $sound       = $filename;
        } else {
            $sound = 'default.png';
        }
        $request['file'] = $sound;

        Sound::create([
            'judul'         => $request->judul,
            'lirik'         => $request->lirik,
            'file'          => $sound,
            'published_at'  => $request->published_at,
            'status'        => $request->status
        ]);
        LogAktivity::addToLog(Auth::user()->name.' Membuat Sounds '.$request['slug']);
        toast('Berhasil Membuat Sounds','success','top-right');
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Sound::findOrFail($id);
        return view('backend.admin.sound.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = Sound::findOrFail($id);
        $path = $request->file('file')->store('file');
        $data->update([
            'judul'         => $request->judul,
            'lirik'         => $request->lirik,
            'file'          => $sound,
            'published_at'  => $request->published_at,
            'status'        => $request->status
        ]);
        
        toast('Berhasil Mengedit Sounds','success','top-right');
        return redirect()->route('admin.sound.index');
    }

    public function delete($id)
    {
        $post = Sound::findOrFail($id);
        $post->delete();
        LogAktivity::addToLog(Auth::user()->name.' Menghapus Sounds '.$post->slug);
        toast('Berhasil Menghapus Sounds','success','top-right');
        return redirect()->back();
    }
}
