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
            <h4 class="page-title" style="margin-left: 18px;">Users Management</h4>
            
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Daftar Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Tambah Users</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active p-3  table-responsive" id="home2" role="tabpanel">
                    <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th width="10px">Avatar</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($users as $user)
                            <tr>
                                <td width="10px">{{ $no++}}</td>
                                <td><img src="{{ asset($user->photo)}}" width="30px" height="30px"> </td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->username}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->role}}</td>
                                <td>
                                    <a href="{{ url('admin/users/update',$user->id)}}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/users/delete',$user->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                   
                    </table>
                </div>
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    <form action="{{ url('/admin/users/store') }}" method="post">
                    {{ csrf_field() }}  
                        <div class="form-group">  
                          <div class="table-responsive">  
                               <table class="table" id="dynamic_field">  
                                    <tr>
                                        <th style="width: 150px">Nama</th>
                                        <th style="width: 150px">Username</th>
                                        <th style="width: 150px">Email</th>
                                        <th style="width: 150px">Password</th>
                                        <th style="width: 150px">Role</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <tr>  
                                         <td><input style="width: 150px" name="nama[]" type="text" class="form-control" required /></td>
                                         <td><input style="width: 150px" name="username[]" type="text" class="form-control" required /></td>
                                         <td><input style="width: 150px" name="email[]" type="email" class="form-control" required /></td>
                                         <td><input style="width: 150px" name="password[]" type="password" class="form-control" required /></td>
                                         <td><select style="width: 150px"  class="form-control" name="role[]" required><option value="Admin">Admin</option></select></td>
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
  <script src="{{ asset('backend/assets/pages/datatables.init.js') }}"></script>
  <script>
     $(document).ready(function(){  
          var i=1;  
          $('.add-file').click(function(){  
               i++;  
               $('#dynamic_field').append('<tr id="row'+i+'"><td><input name="nama[]" type="text" class="form-control" required /></td><td><input name="username[]" type="text" class="form-control" required /></td><td><input name="email[]" type="email" class="form-control" required /></td><td><input style="width: 150px" name="password[]" type="password" class="form-control" required /></td><td><select class="form-control" name="role[]" required><option value="Admin">Admin</option></select></td><td><button type="button" class="btn btn-sm btn-danger btn_remove" id="'+i+'">Hapus</button></td></tr>');  
          });  
          $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
          });  
           
     });  
  </script>
@endsection