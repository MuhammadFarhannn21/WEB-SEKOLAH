<?php

namespace App\Http\Controllers;

use App\Acara;
use Auth;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class AcaraController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    // bagian index
    public function index(){
        $data = Acara::all();
        return view('backend.admin.acara.index',compact('data'));
    }

    // bagian menyimpan data
    public function store(Request $request){
        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }
 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $cek                    = Acara::where('nama',$nama1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Acara::create([
                    'nama'         => $nama1,
                    
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Membuat Acara '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil Membuat Kategori','success','top-right');
        return redirect()->back();
    }

    // bagian ke halaman edit
    public function edit($id){
        $acara = Acara::findOrFail($id);
        return view('backend.admin.acara.edit',compact('acara'));
    }

    // bagian update data 
    public function update(Request $request,$id){
        $this->validate($request, [
            'nama'         => 'required|string|min:3|unique:acara,nama,' . $id
        ]);

        $user = Acara::findOrFail($id);        
        $user->update($request->all());

        LogAktivity::addToLog(Auth::user()->name.' Mengedit acara '.$user->nama);
        toast('Berhasil Mengedit Data','success','top-right');
        return redirect()->route('acara.index');
    }

    // bagian menghapus data
    public function delete($id){
        $acara = Acara::findOrFail($id);
        LogAktivity::addToLog(Auth::user()->name.' Menghapus acara '.$acara->nama);
        $acara->delete();
        toast('Berhasil Menghapus Users','success','top-right');
        return redirect()->back();
    } 
}
