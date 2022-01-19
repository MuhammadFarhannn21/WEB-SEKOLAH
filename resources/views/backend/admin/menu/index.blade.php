@extends('backend.layouts.master')

@section('assets-header')
<link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Menu Management</h4>
            
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Daftar Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Tambah Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#edit1" role="tab">Edit Menu</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active p-3  table-responsive" id="home2" role="tabpanel">
                    <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Posisi</th>
                                <th>Is Parent</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($menu as $datamenu)
                            <tr>
                                <td width="10px">{{ $no++}}</td>
                                <td>{{ $datamenu->nama}}</td>
                                <td>{{ $datamenu->status}}</td>
                                <td>{{ $datamenu->link}}</td>
                                <td>{{ $datamenu->posisi}}</td>
                                <td>{{ $datamenu->isparent}}</td>
                                <td>
                                    <a href="{{ url('admin/menu/delete',$datamenu->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                   
                    </table>
                </div>
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    <form action="{{ url('/admin/menu/store') }}" method="post">
                    {{ csrf_field() }}  
                        <div class="form-group">  
                          <div class="table-responsive">  
                               <table class="table" id="dynamic_field">  
                                    <tr>
                                        <th style="width: 150px">Nama</th>
                                        <th style="width: 150px">Link</th>
                                        <th style="width: 150px">Posisi</th>
                                        <th style="width: 150px">Status</th>
                                        <th style="width: 150px">Is Parent</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <tr>  
                                          <input type="hidden" name="jenis" value="Menu">
                                         <td><input style="width: 150px" name="nama[]" type="text" class="form-control" required /></td>
                                         <td><select style="width: 150px" class="form-control" name="link[]" required><option value="/">beranda</option><option value="/agenda">Agenda</option><option value="/forum">Forum</option>@foreach(\App\Post::where('jenis','Pages')->get() as $post)<option value="/page/{{ $post->slug}}">{{ $post->slug}}</option>@endforeach</select></td>
                                         <td><input style="width: 150px" name="posisi[]" type="number" class="form-control" required /></td>
                                         <td><select style="width: 150px"  class="form-control" name="status[]" required><option value="Aktif">Aktif</option><option value="Nonaktif">Nonaktif</option></select></td>
                                         <td><select style="width: 150px"  class="form-control" name="isparent[]" required><option value="Yes">Yes</option><option selected value="No">No</option></select></td>
                                         <td><button type="button" class="btn btn-sm btn-danger btn_remove">Hapus</button></td>
                                    </tr>  
                               </table>  
                          </div>  
                        </div> 

                        <div class="m-t-20">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button type="button" class="btn btn-secondary add-file">+</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane p-3  table-responsive" id="edit1" role="tabpanel">
                    <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Posisi</th>
                                <th>Is Parent</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <form action="{{ url('/admin/menu/update')}}" method="post">
                                {{ csrf_field()}}

                                <?php $no=1 ?>
                                @foreach($menu as $datamenu)
                                <tr>
                                    <td width="10px">{{ $no++}}</td>
                                    <input type="hidden" name="id[]" value="{{ $datamenu->id}}">
                                    <td><input type="text" name="nama[]" value="{{ $datamenu->nama}}" class="form-control" required></td>
                                    <td>
                                        <select name="status[]" class="form-control" required>
                                            <option value="Aktif" {{ $datamenu->status == "Aktif" ? "selected" : ""}}>Aktif</option>
                                            <option value="NonAktif" {{ $datamenu->status == "NonAktif" ? "selected" : ""}}>NonAktif</option>
                                        </select> 
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="link[]" value="{{$datamenu->link}}" required>
                                    </td>
                                    <td><input type="text" name="posisi[]" value="{{ $datamenu->posisi}}" class="form-control" required></td>
                                    <td>
                                        <select class="form-control" name="isparent[]" required>
                                            <option value="Yes" {{ $datamenu->isparent == "Yes" ? "selected" : ""}}>Yes</option>
                                            <option value="No" {{ $datamenu->isparent == "No" ? "selected" : ""}}>No</option>
                                        </select>
                                    </td>
                                </tr>
                               

                                @endforeach
                                 <tr>
                                    <td colspan="6"><button class="btn btn-primary">Simpan</button></td>
                                </tr>
                            </form>
                        </tbody>                   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home21" role="tab">Daftar Sub Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile21" role="tab">Tambah Sub Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#edit2" role="tab">Edit Sub Menu</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active p-3  table-responsive" id="home21" role="tabpanel">
                    <table id="datatable2" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Posisi</th>
                                <th>Parent Menu</th>
                                <th>Is Sub Parent</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($submenu as $datasubmenu)
                            <tr>
                                <td width="10px">{{ $no++}}</td>
                                <td>{{ $datasubmenu->nama}}</td>
                                <td>{{ $datasubmenu->status}}</td>
                                <td>{{ $datasubmenu->link}}</td>
                                <td>{{ $datasubmenu->posisi}}</td>
                                <td>{{ \App\Menu::findOrFail($datasubmenu->parent_id)->nama }}</td>
                                <td>{{ $datasubmenu->isparent}}</td>
                                <td>
                                    <a href="{{ url('admin/menu/delete',$datasubmenu->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>                   
                    </table>
                </div>
                <div class="tab-pane p-3" id="profile21" role="tabpanel">
                    <form action="{{ url('/admin/submenu/store') }}" method="post">
                    {{ csrf_field() }}  
                        <div class="form-group">  
                          <div class="table-responsive">  
                               <table  class="table" id="dynamic_field2">  
                                    <tr>
                                        <th style="width: 150px">Nama</th>
                                        <th style="width: 150px">Link</th>
                                        <th style="width: 150px">Posisi</th>
                                        <th style="width: 150px">Status</th>
                                        <th style="width: 150px">Parent Menu</th>
                                        <th style="width: 150px">Is Sub Parent</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <tr>  
                                         <input type="hidden" name="jenis" value="SubMenu">
                                         <td><input style="width: 150px" name="nama[]" type="text" class="form-control" required /></td>
                                         <td><select style="width: 150px" class="form-control" name="link[]" required><option value="/">beranda</option><option value="/agenda">Agenda</option><option value="/forum">Forum</option>@foreach(\App\Post::where('jenis','Pages')->get() as $post)<option value="/page/{{ $post->slug}}">{{ $post->slug}}</option>@endforeach</select></td>
                                         <td><input style="width: 150px" name="posisi[]" type="number" class="form-control" required /></td>
                                         <td><select style="width: 150px"  class="form-control" name="status[]" required><option value="Aktif">Aktif</option><option value="Nonaktif">Nonaktif</option></select></td>
                                         <td><select style="width: 150px" class="form-control" name="parent_id[]" required>@foreach(\App\Menu::where('jenis','Menu')->where('isparent','Yes')->get() as $menu)<option value="{{ $menu->id}}">{{ $menu->nama}}</option>@endforeach</select></td>
                                         <td><select style="width: 150px"  class="form-control" name="isparent[]" required><option value="Yes">Yes</option><option selected value="No">No</option></select></td>
                                         <td><button type="button" class="btn btn-sm btn-danger btn_remove">Hapus</button></td>
                                    </tr>  
                               </table>  
                          </div>  
                        </div> 

                        <div class="m-t-20">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button type="button" class="btn btn-secondary add-file2">+</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane p-3  table-responsive" id="edit2" role="tabpanel">
                    <table id="datatable2" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Posisi</th>
                                <th>Parent Menu</th>
                                <th>Is Sub Parent</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <form action="{{ url('/admin/submenu/update') }}" method="post">
                                {{ csrf_field()}}
                                <?php $no=1 ?>
                                @foreach($submenu as $datasubmenu)
                                <tr>
                                    <td width="10px">{{ $no++}}</td>
                                    <input type="hidden" name="id[]" value="{{ $datasubmenu->id }}" required>
                                    <td><input class="form-control" type="text" name="nama[]" value="{{ $datasubmenu->nama}}" required></td>
                                    <td><select name="status[]" class="form-control" required>
                                            <option value="Aktif" {{ $datasubmenu->status == "Aktif" ? "selected" : ""}}>Aktif</option>
                                            <option value="NonAktif" {{ $datasubmenu->status == "NonAktif" ? "selected" : ""}}>NonAktif</option>
                                        </select> 
                                    </td>
                                    <td><input class="form-control" type="text" name="link[]" value="{{$datasubmenu->link}}" required>
                                    </td>
                                    <td><input class="form-control" type="text" name="posisi[]" value="{{ $datasubmenu->posisi}}" required> </td>
                                    <td><select class="form-control" name="parent_id[]" required>
                                            @foreach(\App\Menu::where('jenis','Menu')->where('isparent','Yes')->get() as $menu)
                                            <option value="{{ $menu->id}}" {{ $datasubmenu->parent_id == $menu->id ? "selected" : "" }}>{{ $menu->nama}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="isparent[]" required>
                                            <option value="Yes" {{ $datasubmenu->isparent == "Yes" ? "selected" : ""}}>Yes</option>
                                            <option value="No" {{ $datasubmenu->isparent == "No" ? "selected" : ""}}>No</option>
                                        </select>
                                    </td>
                                   
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6"><button class="btn btn-primary">Simpan</button></td>
                                </tr>
                            </form>
                        </tbody>                   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home211" role="tab">Daftar Sub Sub Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile211" role="tab">Tambah Sub Sub Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#edit3" role="tab">Edit Sub Sub Menu</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active p-3  table-responsive" id="home211" role="tabpanel">
                    <table id="datatable3" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Posisi</th>
                                <th>Parent Menu</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($subsubmenu as $datasubsubmenu)
                            <tr>
                                <td width="10px">{{ $no++}}</td>
                                <td>{{ $datasubsubmenu->nama}}</td>
                                <td>{{ $datasubsubmenu->status}}</td>
                                <td>{{ $datasubsubmenu->link}}</td>
                                <td>{{ $datasubsubmenu->posisi}}</td>
                                <td>{{ \App\Menu::findOrFail($datasubsubmenu->parent_id)->nama }}</td>
                                <td>
                                    <a href="{{ url('admin/menu/delete',$datasubsubmenu->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                   
                    </table>
                </div>
                <div class="tab-pane p-3" id="profile211" role="tabpanel">
                    <form action="{{ url('/admin/subsubmenu/store') }}" method="post">
                    {{ csrf_field() }}  
                        <div class="form-group">  
                          <div class="table-responsive">  
                               <table  class="table" id="dynamic_field3">  
                                    <tr>
                                        <th style="width: 150px">Nama</th>
                                        <th style="width: 150px">Link</th>
                                        <th style="width: 150px">Posisi</th>
                                        <th style="width: 150px">Status</th>
                                        <th style="width: 150px">Parent Menu</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <tr>  
                                         <input type="hidden" name="jenis" value="SubSubMenu">
                                         <td><input style="width: 150px" name="nama[]" type="text" class="form-control" required /></td>
                                         <td><select style="width: 150px" class="form-control" name="link[]" required><option value="/">beranda</option><option value="/agenda">Agenda</option><option value="/forum">Forum</option>@foreach(\App\Post::where('jenis','Pages')->get() as $post)<option value="/page/{{ $post->slug}}">{{ $post->slug}}</option>@endforeach</select></td>
                                         <td><input style="width: 150px" name="posisi[]" type="number" class="form-control" required /></td>
                                         <td><select style="width: 150px"  class="form-control" name="status[]" required><option value="Aktif">Aktif</option><option value="Nonaktif">Nonaktif</option></select></td>
                                         <td><select style="width: 150px" class="form-control" name="parent_id[]" required>@foreach(\App\Menu::where('jenis','SubMenu')->where('isparent','Yes')->get() as $menu)<option value="{{ $menu->id}}">{{ $menu->nama}}</option>@endforeach</select></td>
                                         <td><button type="button" class="btn btn-sm btn-danger btn_remove">Hapus</button></td>
                                    </tr>  
                               </table>  
                          </div>  
                        </div> 

                        <div class="m-t-20">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button type="button" class="btn btn-secondary add-file3">+</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane p-3  table-responsive" id="edit3" role="tabpanel">
                    <table id="datatable3" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Link</th>
                                <th>Posisi</th>
                                <th>Parent Menu</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <form action="{{ url('/admin/subsubmenu/update')}}" method="post">
                                {{ csrf_field()}}
                                <?php $no=1 ?>
                                @foreach($subsubmenu as $datasubsubmenu)
                                <tr>
                                    <td width="10px">{{ $no++}}</td>
                                    <input type="hidden" name="id[]" class="form-control" value="{{ $datasubsubmenu->id }}">
                                    <td><input type="text" name="nama[]" class="form-control" value="{{ $datasubsubmenu->nama }}"> </td>
                                    <td><select name="status[]" class="form-control" required>
                                            <option value="Aktif" {{ $datasubsubmenu->status == "Aktif" ? "selected" : ""}}>Aktif</option>
                                            <option value="NonAktif" {{ $datasubsubmenu->status == "NonAktif" ? "selected" : ""}}>NonAktif</option>
                                        </select> 
                                    </td>
                                    <td><input class="form-control" type="text" name="link[]" value="{{$datasubsubmenu->link}}" required>
                                    </td>
                                    <td><input class="form-control" type="text" name="posisi[]" value="{{ $datasubsubmenu->posisi}}" required> </td>
                                    <td><select class="form-control" name="parent_id[]" required>
                                            @foreach(\App\Menu::where('jenis','SubMenu')->where('isparent','Yes')->get() as $menu)
                                            <option value="{{ $menu->id}}" {{ $datasubsubmenu->parent_id == $menu->id ? "selected" : "" }}>{{ $menu->nama}}</option>
                                            @endforeach
                                        </select>
                                    </td>                 
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6"><button class="btn btn-primary">Simpan</button></td>
                                </tr>
                            </form>
                        </tbody>                   
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('assets-footer')
  <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/jszip.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/assets/pages/datatables2.init.js') }}"></script>
  <script>
     $(document).ready(function(){  
          var i=1;  
          $('.add-file').click(function(){  
               i++;  
               $('#dynamic_field').append('<tr id="row'+i+'"><td><input style="width: 150px" name="nama[]" type="text" class="form-control" required /></td><td><select style="width: 150px" class="form-control" name="link[]" required><option value="/">beranda</option><option value="/agenda">Agenda</option><option value="/forum">Forum</option>@foreach(\App\Post::where('jenis','Pages')->get() as $post)<option value="/page/{{ $post->slug}}">{{ $post->slug}}</option>@endforeach</select></td><td><input style="width: 150px" name="posisi[]" type="number" class="form-control" required /></td><td><select style="width: 150px"  class="form-control" name="status[]" required><option value="Aktif">Aktif</option><option value="Nonaktif">Nonaktif</option></select></td><td><select style="width: 150px"  class="form-control" name="isparent[]" required><option value="Yes">Yes</option><option selected value="No">No</option></select></td><td><button type="button" class="btn btn-sm btn-danger btn_remove" id="'+i+'">Hapus</button></td></tr>');  
          });  
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  
           
     });  
  </script>
  <script>
     $(document).ready(function(){  
          var i=1;  
          $('.add-file2').click(function(){  
               i++;  
               $('#dynamic_field2').append('<tr id="row'+i+'"><td><input style="width: 150px" name="nama[]" type="text" class="form-control" required /></td><td><select style="width: 150px" class="form-control" name="link[]" required><option value="/">beranda</option><option value="/agenda">Agenda</option><option value="/forum">Forum</option>@foreach(\App\Post::where('jenis','Pages')->get() as $post)<option value="/page/{{ $post->slug}}">{{ $post->slug}}</option>@endforeach</select></td><td><input style="width: 150px" name="posisi[]" type="number" class="form-control" required /></td><td><select style="width: 150px"  class="form-control" name="status[]" required><option value="Aktif">Aktif</option><option value="Nonaktif">Nonaktif</option></select></td><td><select style="width: 150px" class="form-control" name="parent_id[]" required>@foreach(\App\Menu::where('jenis','Menu')->where('isparent','Yes')->get() as $menu)<option value="{{ $menu->id}}">{{ $menu->nama}}</option>@endforeach</select></td><td><select style="width: 150px"  class="form-control" name="isparent[]" required><option value="Yes">Yes</option><option selected value="No">No</option></select></td><td><button type="button" class="btn btn-sm btn-danger btn_remove" id="'+i+'">Hapus</button></td></tr>');  
          });  
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  
           
     });  
  </script>
  <script>
     $(document).ready(function(){  
          var i=1;  
          $('.add-file3').click(function(){  
               i++;  
               $('#dynamic_field3').append('<tr id="row'+i+'"><td><input style="width: 150px" name="nama[]" type="text" class="form-control" required /></td><td><select style="width: 150px" class="form-control" name="link[]" required><option value="/">beranda</option><option value="/agenda">Agenda</option><option value="/forum">Forum</option>@foreach(\App\Post::where('jenis','Pages')->get() as $post)<option value="/page/{{ $post->slug}}">{{ $post->slug}}</option>@endforeach</select></td><td><input style="width: 150px" name="posisi[]" type="number" class="form-control" required /></td><td><select style="width: 150px"  class="form-control" name="status[]" required><option value="Aktif">Aktif</option><option value="Nonaktif">Nonaktif</option></select></td><td><select style="width: 150px" class="form-control" name="parent_id[]" required>@foreach(\App\Menu::where('jenis','SubMenu')->where('isparent','Yes')->get() as $menu)<option value="{{ $menu->id}}">{{ $menu->nama}}</option>@endforeach</select></td><td><button type="button" class="btn btn-sm btn-danger btn_remove" id="'+i+'">Hapus</button></td></tr>');  
          });  
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  
           
     });  
  </script>
@endsection