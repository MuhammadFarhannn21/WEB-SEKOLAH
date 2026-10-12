<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Auth;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    
    public function index()
    {
    	$posts = Post::where('jenis','!=','forum')->orderBy('id','DESC')->paginate(50);
		return view('backend.admin.posts.index',compact('posts'));
    }

    public function create()
    {
        $post = null;
    	return view('backend.admin.posts.create',compact('post'));
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
        $request['slug']    = Str::slug($request->get('title'), '-');
        $request['user_id'] = $request->user()->id;

        Post::create($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Membuat Posts '.$request['slug']);
        toast('Berhasil Membuat Posts','success','top-right');
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.admin.posts.edit',compact('post'));
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
        $request['slug']    = Str::slug($request->get('title'), '-');

        $post->update($request->all());
        LogAktivity::addToLog(Auth::user()->name.' Mengedit Posts Id '.$post->id);
        toast('Berhasil Mengedit Posts','success','top-right');
        return redirect()->route('admin.posts.index');

    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        LogAktivity::addToLog(Auth::user()->name.' Menghapus Posts '.$post->slug);
        toast('Berhasil Menghapus Posts','success','top-right');
        return redirect()->back();
    }
}
