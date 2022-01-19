<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class ForumController extends Controller
{
	// bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
    	$posts = Post::where('jenis','forum')->orderBy('id','DESC')->paginate(50);
		return view('backend.admin.forum.index',compact('posts'));
    }

    public function create()
    {
        $post = null;
    	return view('backend.admin.forum.create',compact('post'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'   => 'required',
            'title'         => 'required|string|min:5|unique:posts',
            'body'          => 'required|min:20',
            'status'        => 'required',
            'published_at'  => 'required'
        ]);
        $request['slug']    = str_slug($request->get('title'), '-');
        $request['user_id'] = $request->user()->id;
        $request['jenis'] = "forum";

        Post::create($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Membuat Forum '.$request['slug']);
        toast('Berhasil Membuat Forum','success','top-right');
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.admin.forum.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->validate($request, [
            'category_id'   => 'required',
            'title'         => 'required|string|min:5|unique:posts,title,' . $id,
            'body'          => 'required|min:20',
            'status'        => 'required',
            'published_at'  => 'required'
        ]);
        $request['slug']    = str_slug($request->get('title'), '-');

        $post->update($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Mengedit Forum Id '.$post->id);
        toast('Berhasil Mengedit Forum','success','top-right');
        return redirect()->route('admin.forum.index');

    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        LogAktivity::addToLog(Auth::user()->name.' Menghapus Forum '.$post->slug);
        toast('Berhasil Menghapus Forum','success','top-right');
        return redirect()->back();
    }
}
