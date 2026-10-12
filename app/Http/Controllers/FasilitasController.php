<?php
namespace App\Http\Controllers;
use Auth;
use App\Fasilitas;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class FasilitasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
        $data = Fasilitas::all();
        return view('backend.admin.fasilitas.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('foto_file')) {
            $file = $request->file('foto_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos/shares'), $filename);
            $data['foto'] = 'photos/shares/' . $filename;
        }
        Fasilitas::create($data);
        toast('Berhasil Menyimpan Data','success','top-right');
        return redirect()->back();
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('backend.admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('foto_file')) {
            $file = $request->file('foto_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos/shares'), $filename);
            $data['foto'] = 'photos/shares/' . $filename;
        }
        $fasilitas->update($data);
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }

    public function delete($id)
    {
        Fasilitas::findOrFail($id)->delete();
        toast('Berhasil Menghapus Data','success','top-right');
        return redirect()->back();
    }
}