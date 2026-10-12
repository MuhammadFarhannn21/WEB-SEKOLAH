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
            <h4 class="page-title" style="margin-left: 18px;">Posts Management</h4>
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <div class="card-title">
              <a href="{{ url('/admin/posts')}}" class="btn btn-info">Daftar Post</a>
              <a href="{{ url('/admin/posts/create')}}" class="btn btn-warning">Buat Post</a>
            </div>
            <div class="card-body table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Created Date</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>     
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($posts as $post)
                        <tr>
                            <td width="10px">{{ $no++}}</td>
                            <td><img src="{{ asset($post->featured)}}" width="30px" height="30px"> </td>
                            <td>{!! substr($post->title, 0, 10) !!}</td>
                            <td>{{ $post->jenis}}</td>
                            <td>{{ $post->category->title ?? 'Tanpa Kategori' }}</td>
                            <td>{{ $post->status == 1 ? "Publish" : "Draft"}}</td>
                            <td>{{ $post->user->name ?? 'Admin' }}</td>
                            <?php $tanggal=date_create($post->published_at); ?> 
                            <td>{{ date_format($tanggal,"d F Y")}}</td>
                            
                            <td>
                                <a href="{{ url('admin/posts/update',$post->id)}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/posts/delete',$post->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                   
                </table>
            </div>
            <div class="card-footer">
              {{ $posts->links()}}
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
@endsection