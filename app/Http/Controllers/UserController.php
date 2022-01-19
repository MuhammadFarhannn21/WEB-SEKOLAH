<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class UserController extends Controller
{
	// bagian autentifikasi
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    // bagian index
    public function index(){
    	$users = User::where('role','Admin')->get();
    	return view('backend.admin.users.index',compact('users'));
    }

    // bagian menyimpan data
    public function store(Request $request){
    	foreach ($request->nama as $values) {
             $nama[]    = $values;
        }

        foreach ($request->username as $keys) {
             $username[] = $keys;
        }

        foreach ($request->email as $keys) {
             $email[] = $keys;
        }

        foreach ($request->role as $keys) {
             $role[] = $keys;
        }

        foreach ($request->password as $keys) {
             $password[] = $keys;
        }
 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1          		= $nama[$no];
            $username1          	= $username[$no];
            $email1          		= $email[$no];
            $role1          		= $role[$no];
            $password1          	= $password[$no];
            $cek                    = User::where('username',$username1)
            						->where('email',$email1)
                                    ->count();

            if ($cek > 0) {

            }else{
                User::create([
                    'name'          => $nama1,
                    'username'      => $username1,
                    'email'		    => $email1,
                    'role'		    => $role1,
                    'password'		=> bcrypt($password1),
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Membuat User '.$nama1);
            }
              
           $no++;
        }
       	
        toast('Berhasil Membuat Users','success','top-right');
        return redirect()->back();
    }

    // bagian ke halaman edit
    public function edit($id){
    	$user = User::findOrFail($id);
    	return view('backend.admin.users.edit',compact('user'));
    }

    // bagian update data 
    public function update(Request $request,$id){
        $this->validate($request, [
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,' . $id,
            'password'          => 'nullable|string|min:6',
            'role'              => 'required'
        ]);

        $user = User::findOrFail($id);

        $request['password']    = $request->get('password') ? bcrypt($request->get('password')) : $user->password;
        $request['photo']       = $request->get('photo') ? $request->get('photo') : '/svg/avatar.png';
        
        $user->update($request->all());

        LogAktivity::addToLog(Auth::user()->name.' Mengedit User '.$user->name);
        toast('Berhasil Mengedit Data','success','top-right');
        return redirect()->back();
    }

    // bagian menghapus data
    public function delete($id){
    	$user = User::findOrFail($id);
    	LogAktivity::addToLog(Auth::user()->name.' Menghapus User '.$user->name);
    	$user->delete();
    	toast('Berhasil Menghapus Users','success','top-right');
        return redirect()->back();
    }
}
