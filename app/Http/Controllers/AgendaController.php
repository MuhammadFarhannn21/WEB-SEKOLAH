<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Agenda;
use Auth;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class AgendaController extends Controller
{
    // bagian autentifikasi
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    // bagian index
    public function index(){
        $data = Agenda::all();
        return view('backend.admin.agenda.index',compact('data'));
    }

    // bagian menyimpan data
    public function store(Request $request){
        foreach ($request->title as $values) {
             $title[]    = $values;
        }

        foreach ($request->start as $values) {
             $start[]    = $values;
        }

        foreach ($request->end as $values) {
             $end[]    = $values;
        }
 
        $no = 0;
        while ($no < count($request->title)) {

            $title1                 = $title[$no];
            $start1                 = $start[$no];
            $end1                  	= $end[$no];
            $cek                    = Agenda::where('title',$title1)->where('start',$start1)->where('end',$end1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Agenda::create([
                    'title'         => $title1,
                    'start'         => $start1,
                    'end'         	=> $end1,
                    
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Membuat Agenda '.$title1);
            }
              
           $no++;
        }
        
        toast('Berhasil Membuat Agenda','success','top-right');
        return redirect()->back();
    }

    // bagian ke halaman edit
    public function edit($id){
        $agenda = Agenda::findOrFail($id);
        return view('backend.admin.agenda.edit',compact('agenda'));
    }

    // bagian update data 
    public function update(Request $request,$id){
        $this->validate($request, [
            'title'         => 'required|string|min:3|unique:categories,title,' . $id
        ]);
        $request['slug']    = Str::slug($request->get('title'), '-');

        $user = Agenda::findOrFail($id);        
        $user->update($request->all());

        LogAktivity::addToLog(Auth::user()->name.' Mengedit agenda '.$user->title);
        toast('Berhasil Mengedit Data','success','top-right');
        return redirect()->route('agenda.index');
    }

    // bagian menghapus data
    public function delete($id){
        $agenda = Agenda::findOrFail($id);
        LogAktivity::addToLog(Auth::user()->name.' Menghapus agenda '.$agenda->title);
        $agenda->delete();
        toast('Berhasil Menghapus Users','success','top-right');
        return redirect()->back();
    } 
}
