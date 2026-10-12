<?php
namespace App\Http\Controllers;
use Auth;
use App\Ekstrakurikuler;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class EkstrakurikulerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
        $data = Ekstrakurikuler::all();
        return view('backend.admin.ekstrakurikuler.index', compact('data'));
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
        Ekstrakurikuler::create($data);
        toast('Berhasil Menyimpan Data','success','top-right');
        return redirect()->back();
    }

    public function edit($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('backend.admin.ekstrakurikuler.edit', compact('ekskul'));
    }

    public function update(Request $request, $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('foto_file')) {
            $file = $request->file('foto_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos/shares'), $filename);
            $data['foto'] = 'photos/shares/' . $filename;
        }
        $ekskul->update($data);
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }

    public function delete($id)
    {
        Ekstrakurikuler::findOrFail($id)->delete();
        toast('Berhasil Menghapus Data','success','top-right');
        return redirect()->back();
    }
}