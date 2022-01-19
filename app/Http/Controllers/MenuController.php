<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Menu;
use Illuminate\Http\Request;
use App\Helpers\LogAktivity;

class MenuController extends Controller
{
    // bagian index
    public function index(){
        $menu       = Menu::where('jenis','Menu')->get();
        $submenu    = Menu::where('jenis','Submenu')->get();
        $subsubmenu = Menu::where('jenis','SubSubMenu')->get();

        return view('backend.admin.menu.index',compact('menu','submenu','subsubmenu'));
    }

    // bagian menyimpan data menu
    public function storeMenu(Request $request){
        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }

        foreach ($request->link as $keys) {
             $link[] = $keys;
        }

        foreach ($request->posisi as $keys) {
             $posisi[] = $keys;
        }

        foreach ($request->status as $keys) {
             $status[] = $keys;
        }

        foreach ($request->isparent as $keys) {
             $isparent[] = $keys;
        }
 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $link1                  = $link[$no];
            $posisi1                = $posisi[$no];
            $status1                = $status[$no];
            $isparent1              = $isparent[$no];
            $cek                    = Menu::where('nama',$nama1)
                                    ->where('posisi',$posisi1)
                                    ->where('jenis',$request['jenis'])
                                    ->where('link',$link1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Menu::create([
                    'nama'          => $nama1,
                    'link'          => $link1,
                    'jenis'         => $request['jenis'],
                    'posisi'        => $posisi1,
                    'status'        => $status1,
                    'isparent'      => $isparent1,
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Membuat Menu '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil Membuat Menu','success','top-right');
        return redirect()->back();
    }

    // bagian menyimpan sub menu
    public function storeSubMenu(Request $request){
        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }

        foreach ($request->link as $keys) {
             $link[] = $keys;
        }

        foreach ($request->posisi as $keys) {
             $posisi[] = $keys;
        }

        foreach ($request->status as $keys) {
             $status[] = $keys;
        }

        foreach ($request->isparent as $keys) {
             $isparent[] = $keys;
        }

        foreach ($request->parent_id as $keys) {
             $parent_id[] = $keys;
        }
 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $link1                  = $link[$no];
            $posisi1                = $posisi[$no];
            $status1                = $status[$no];
            $isparent1              = $isparent[$no];
            $parentid1              = $parent_id[$no];
            $cek                    = Menu::where('nama',$nama1)
                                    ->where('posisi',$posisi1)
                                    ->where('jenis',$request['jenis'])
                                    ->where('link',$link1)
                                    ->where('parent_id',$parentid1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Menu::create([
                    'nama'          => $nama1,
                    'link'          => $link1,
                    'jenis'         => $request['jenis'],
                    'posisi'        => $posisi1,
                    'status'        => $status1,
                    'isparent'      => $isparent1,
                    'parent_id'     => $parentid1,
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Membuat SubMenu '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil Membuat SubMenu','success','top-right');
        return redirect()->back();
    }

    // bagian menyimpan sub sub menu
    public function storeSubSubMenu(Request $request){
        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }

        foreach ($request->link as $keys) {
             $link[] = $keys;
        }

        foreach ($request->posisi as $keys) {
             $posisi[] = $keys;
        }

        foreach ($request->status as $keys) {
             $status[] = $keys;
        }

        foreach ($request->parent_id as $keys) {
             $parent_id[] = $keys;
        }

 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $link1                  = $link[$no];
            $posisi1                = $posisi[$no];
            $status1                = $status[$no];
            $parent_id1             = $parent_id[$no];
            $cek                    = Menu::where('nama',$nama1)
                                    ->where('posisi',$posisi1)
                                    ->where('jenis',$request['jenis'])
                                    ->where('link',$link1)
                                    ->where('parent_id',$parent_id1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Menu::create([
                    'nama'          => $nama1,
                    'link'          => $link1,
                    'jenis'         => $request['jenis'],
                    'posisi'        => $posisi1,
                    'status'        => $status1,
                    'parent_id'     => $parent_id1,
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Membuat SubSubMenu '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil Membuat SubSubMenu','success','top-right');
        return redirect()->back();
    }

    // bagian update data menu
    public function updateMenu(Request $request){
        foreach ($request->id as $values) {
             $id[]    = $values;
        }

        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }

        foreach ($request->link as $keys) {
             $link[] = $keys;
        }

        foreach ($request->posisi as $keys) {
             $posisi[] = $keys;
        }

        foreach ($request->status as $keys) {
             $status[] = $keys;
        }

        foreach ($request->isparent as $keys) {
             $isparent[] = $keys;
        }
 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $link1                  = $link[$no];
            $posisi1                = $posisi[$no];
            $status1                = $status[$no];
            $isparent1              = $isparent[$no];
            $id1                    = $id[$no];
            $cek                    = Menu::where('nama',$nama1)
                                    ->where('posisi',$posisi1)
                                    ->where('jenis',$request['jenis'])
                                    ->where('link',$link1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Menu::findOrFail($id1)->update([
                    'nama'          => $nama1,
                    'link'          => $link1,
                    'jenis'         => 'Menu',
                    'posisi'        => $posisi1,
                    'status'        => $status1,
                    'isparent'      => $isparent1,
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Mengupdate Menu '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil Mengupdate Menu','success','top-right');
        return redirect()->back();
    }

    // bagian update data sub menu
    public function updateSubMenu(Request $request){
        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }

        foreach ($request->link as $keys) {
             $link[] = $keys;
        }

        foreach ($request->posisi as $keys) {
             $posisi[] = $keys;
        }

        foreach ($request->status as $keys) {
             $status[] = $keys;
        }

        foreach ($request->isparent as $keys) {
             $isparent[] = $keys;
        }

        foreach ($request->parent_id as $keys) {
             $parent_id[] = $keys;
        }

        foreach ($request->id as $keys) {
             $id[] = $keys;
        }
 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $link1                  = $link[$no];
            $posisi1                = $posisi[$no];
            $status1                = $status[$no];
            $isparent1              = $isparent[$no];
            $parentid1              = $parent_id[$no];
            $id1                    = $id[$no];
            $cek                    = Menu::where('nama',$nama1)
                                    ->where('posisi',$posisi1)
                                    ->where('jenis',$request['jenis'])
                                    ->where('link',$link1)
                                    ->where('parent_id',$parentid1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Menu::findOrFail($id1)->update([
                    'nama'          => $nama1,
                    'link'          => $link1,
                    'jenis'         => 'SubMenu',
                    'posisi'        => $posisi1,
                    'status'        => $status1,
                    'isparent'      => $isparent1,
                    'parent_id'     => $parentid1,
                ]);
                LogAktivity::addToLog(Auth::user()->name.' mengupdate SubMenu '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil mengupdate SubMenu','success','top-right');
        return redirect()->back();
    }

    // bagian update data sub sub menu
    public function updateSubSubMenu(Request $request){
        foreach ($request->id as $values) {
             $id[]    = $values;
        }

        foreach ($request->nama as $values) {
             $nama[]    = $values;
        }

        foreach ($request->link as $keys) {
             $link[] = $keys;
        }

        foreach ($request->posisi as $keys) {
             $posisi[] = $keys;
        }

        foreach ($request->status as $keys) {
             $status[] = $keys;
        }

        foreach ($request->parent_id as $keys) {
             $parent_id[] = $keys;
        }

 
        $no = 0;
        while ($no < count($request->nama)) {

            $nama1                  = $nama[$no];
            $link1                  = $link[$no];
            $posisi1                = $posisi[$no];
            $status1                = $status[$no];
            $parent_id1             = $parent_id[$no];
            $id1                    = $id[$no];
            $cek                    = Menu::where('nama',$nama1)
                                    ->where('posisi',$posisi1)
                                    ->where('jenis',$request['jenis'])
                                    ->where('link',$link1)
                                    ->where('parent_id',$parent_id1)
                                    ->count();

            if ($cek > 0) {

            }else{
                Menu::findOrFail($id1)->update([
                    'nama'          => $nama1,
                    'link'          => $link1,
                    'jenis'         => 'SubSubMenu',
                    'posisi'        => $posisi1,
                    'status'        => $status1,
                    'parent_id'     => $parent_id1,
                ]);
                LogAktivity::addToLog(Auth::user()->name.' Mengupdate SubSubMenu '.$nama1);
            }
              
           $no++;
        }
        
        toast('Berhasil Mengupdate SubSubMenu','success','top-right');
        return redirect()->back();
    }

    // bagian menghapus data
    public function delete($id){
        $menu = Menu::findOrFail($id);
        LogAktivity::addToLog(Auth::user()->name.' Menghapus Menu '.$menu->nama);

        if($menu->jenis == "SubSubMenu")
        {
            $menu->delete();
        }
        elseif($menu->jenis == "SubMenu")
        {
            $subSubMenu = Menu::where('parent_id',$menu->id)->get();
            foreach($subSubMenu as $row)
            {
                $rowSubSubMenu = Menu::findOrFail($row->id);
                $rowSubSubMenu->delete();
            }
        }
        elseif($menu->jenis == "Menu")
        {
            $subMenu = Menu::where('parent_id',$menu->id)->get();
            foreach($subMenu as $row)
            {
                $rowSubMenu = Menu::findOrFail($row->id);
                $subSubMenu = Menu::where('parent_id',$rowSubMenu->id)->get();
                foreach($subSubMenu as $row)
                {
                    $rowSubSubMenu = Menu::findOrFail($row->id);
                    $rowSubSubMenu->delete();
                }

                $rowSubMenu->delete();
            }
            $menu->delete();
        }
        
        toast('Berhasil Menghapus Menu','success','top-right');
        return redirect()->back();
    }
}
