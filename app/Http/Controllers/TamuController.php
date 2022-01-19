<?php

namespace App\Http\Controllers;

use App\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    
    public function index()
    {
    	$data = Tamu::orderBy('id','DESC')->get();
    	return view('backend.admin.tamu.index',compact('data'));
    }
}
