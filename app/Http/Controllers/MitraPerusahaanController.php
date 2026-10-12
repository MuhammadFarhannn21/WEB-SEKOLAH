<?php
namespace App\Http\Controllers;
use App\MitraPerusahaan;
use Illuminate\Http\Request;

class MitraPerusahaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
        $data = MitraPerusahaan::all();
        return view('backend.admin.mitra.index', compact('data'));
    }

    public function store(Request $request)
    {
        MitraPerusahaan::create($request->all());
        toast('Berhasil Menyimpan Data','success','top-right');
        return redirect()->back();
    }

    public function edit($id)
    {
        $mitra = MitraPerusahaan::findOrFail($id);
        return view('backend.admin.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $mitra = MitraPerusahaan::findOrFail($id);
        $mitra->update($request->all());
        toast('Berhasil Mengupdate Data','success','top-right');
        return redirect()->back();
    }

    public function delete($id)
    {
        MitraPerusahaan::findOrFail($id)->delete();
        toast('Berhasil Menghapus Data','success','top-right');
        return redirect()->back();
    }
}