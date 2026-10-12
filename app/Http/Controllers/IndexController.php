<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Category;
use App\Comment;
use App\Statistik;
use App\Gallery;
use App\Tamu;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class IndexController extends Controller
{
    public function index(){
        $cek = \App\Statistik::where('tanggal',date('Y-m-d'))->where('ip',$_SERVER['REMOTE_ADDR'])->get();
        if(count($cek) >= 1){

        }else{
            \App\Statistik::create([
                'tanggal' => date('Y-m-d'),
                'ip' => $_SERVER['REMOTE_ADDR']
            ]);
        }
        
        return view('frontend.index');
    }

    public function showPage($slug){
    	$post       = Post::where('jenis','Pages')->where('slug', $slug)->first();
    	if ($post == null) {
    		abort(404);
    	}
    	return view('frontend.showPage',compact('post'));
    }

    public function showBerita($slug){
    	$post       = Post::where('jenis','Berita')->where('slug', $slug)->first();
    	if ($post == null) {
    		abort(404);
    	}
    	return view('frontend.showBerita',compact('post'));
    }

    public function showEvent($slug){
    	$post       = Post::where('jenis','Acara')->where('slug', $slug)->first();
    	if ($post == null) {
    		abort(404);
    	}
    	return view('frontend.showEvent',compact('post'));
    }

    public function showKategori($slug){
        $category       = Category::where('slug',$slug)->first();
        if ($category == null) {
            abort(404);
        }

        $post = Post::where('status',1)->where('jenis','Berita')->where('category_id',$category->id)->orderBy('id','DESC')->paginate(6);

        return view('frontend.showKategori',compact('post','category'));
    }

    public function komentar(Request $request,$id){
        $request['status'] = 0;
        $komentar = Comment::create($request->all());
        toast('Berhasil Mengirim Komentar','success','top-right');
        return redirect()->back();
    }

    public function search(Request $request){
        $judul = $request->q;
        $post = Post::where('status',1)->where('title', 'LIKE', "%{$judul}%")->orderBy('id','DESC')->get();

        return view('frontend.search',compact('post','judul'));
    }

    public function forum(){
        $post = Post::where('status',1)->orderBy('id','DESC')->where('jenis','forum')->paginate(10);
        return view('frontend.forum',compact('post'));   
    }

    public function showForum($slug){
        $post       = Post::where('jenis','forum')->where('slug', $slug)->first();
        if ($post == null) {
            abort(404);
        }
        return view('frontend.showForum',compact('post'));
    }

    public function berita(){
        $post = Post::where('status',1)->orderBy('id','DESC')->where('jenis','Berita')->paginate(10);
        return view('frontend.berita',compact('post'));
       
    }

    public function event(){
        $post = Post::where('status',1)->orderBy('id','DESC')->where('jenis','Acara')->paginate(10);
        return view('frontend.event',compact('post'));
    }

    public function gallery(){
        $gallery = Gallery::where('status','aktif')->orderBy('id','DESC')->paginate(10);
        return view('frontend.gallery',compact('gallery'));
    }

    public function agenda(){
        return view('frontend.agenda');
    }

    public function tamu()
    {
        return view('frontend.tamu');
    }

    public function randomString($length = 30) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function tamuStore(Request $request)
    {
        $this->validate($request, [
            'photo'            => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        $namaFile = IndexController::randomString().".".$request->file('photo')->getClientOriginalExtension();
        $image = move_uploaded_file($_FILES['photo']['tmp_name'], 'buku_tamu/'.$namaFile);
        
        $data = Tamu::create([
            'acara_id'           => $request->acara_id,
            'nama'           => $request->nama_pengunjung,
            'instansi'     => $request->instansi,
            'telepon'         => $request->telepon,
            'email'    => $request->email,
            'alamat'        => $request->alamat,
            'keterangan' => $request->keterangan,
            'photo'            => $namaFile,
        ]);

        if($data)
        {
            toast('Berhasil Mengisi Buku Tamu','success','top-right');
            return redirect()->back();
        }
        else
        {
            toast('Gagal Mengisi  Buku Tamu','success','top-right');
            return redirect()->back();
        }
    }
    public function fasilitas()
    {
        $fasilitas = \App\Fasilitas::where('status','aktif')->orderBy('id','DESC')->get();
        return view('frontend.fasilitas', compact('fasilitas'));
    }

    public function showFasilitas($id)
    {
        $fasilitas = \App\Fasilitas::findOrFail($id);
        return view('frontend.showFasilitas', compact('fasilitas'));
    }

    public function ekstrakurikuler()
    {
        $ekskul = \App\Ekstrakurikuler::where('status','aktif')->orderBy('id','DESC')->get();
        return view('frontend.ekstrakurikuler', compact('ekskul'));
    }

    public function showEkstrakurikuler($id)
    {
        $ekskul = \App\Ekstrakurikuler::findOrFail($id);
        return view('frontend.showEkstrakurikuler', compact('ekskul'));
    }

    public function jurusanList()
    {
        $jurusan = \App\Jurusan::orderBy('id','DESC')->get();
        return view('frontend.jurusan', compact('jurusan'));
    }

    public function showJurusan($id)
    {
        $jurusan = \App\Jurusan::findOrFail($id);
        return view('frontend.showJurusan', compact('jurusan'));
    }
}
