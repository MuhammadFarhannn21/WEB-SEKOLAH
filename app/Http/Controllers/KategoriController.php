<?php

namespace App\Http\Controllers;

use App\Category;
use Auth;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class KategoriController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    // bagian index
    public function index(){
        $data = Category::all();
        return view('backend.admin.kategori.index',compact('data'));
    }

    // bagian menyimpan data
    public function store(Request $request){
        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }
 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $cek                    = Category::where('title',$nama1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Category::create([
                    'title'         => $nama1,
                    'slug'          => str_slug($nama1, '-')
                    
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Membuat Kategori '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil Membuat Kategori','success','top-right');
        return redirect()->back();
    }

    // bagian ke halaman edit
    public function edit($id){
        $kategori = Category::findOrFail($id);
        return view('backend.admin.kategori.edit',compact('kategori'));
    }

    // bagian update data 
    public function update(Request $request,$id){
        $this->validate($request, [
            'title'         => 'required|string|min:3|unique:categories,title,' . $id
        ]);
        $request['slug']    = str_slug($request->get('title'), '-');

        $user = Category::findOrFail($id);        
        $user->update($request->all());

        LogAktivity::addToLog(Auth::user()->name.' Mengedit kategori '.$user->title);
        toast('Berhasil Mengedit Data','success','top-right');
        return redirect()->route('kategori.index');
    }

    // bagian menghapus data
    public function delete($id){
        $kategori = Category::findOrFail($id);
        LogAktivity::addToLog(Auth::user()->name.' Menghapus kategori '.$kategori->title);
        $kategori->delete();
        toast('Berhasil Menghapus Users','success','top-right');
        return redirect()->back();
    } 
}
