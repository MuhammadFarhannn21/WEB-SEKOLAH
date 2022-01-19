<?php

namespace App\Http\Controllers;

use App\LogAktivity;
use Illuminate\Http\Request;
use DataTables;

class LogAktivityController extends Controller
{
	public function index()
	{
		return view('backend.admin.logaktifitas.index');
	}
    public function api()
    {
    	return DataTables::of(LogAktivity::orderBy('id','DESC')->get())
    		   			    ->addIndexColumn()
                		    ->make(true);
    }
}
