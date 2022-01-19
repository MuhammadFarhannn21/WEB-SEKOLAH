<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
	public function index(){
		$komentar = Comment::orderBy('id','DESC')->paginate(50);
		return view('backend.admin.komentar.index',compact('komentar'));
	}

	public function aktif($id){
		$komentar = Comment::findOrFail($id);
		$komentar->update([
			'status' => 1,
		]);
		toast('Berhasil Mengaktifkan Komentar','success','top-right');
        return redirect()->back();
	}
	public function delete($id){
		$komentar = Comment::findOrFail($id);
		$komentar->delete();
		toast('Berhasil Menghapus Komentar','success','top-right');
        return redirect()->back();
	}
}
