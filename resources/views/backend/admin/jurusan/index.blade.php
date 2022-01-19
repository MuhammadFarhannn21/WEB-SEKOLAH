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
            <h4 class="page-title" style="margin-left: 18px;">Daftar Jurusan</h4>
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <div class="card-title">
              <a href="{{ url('/admin/jurusan')}}" class="btn btn-info">Daftar Jurusan</a>
              <a href="{{ url('/admin/jurusan/create')}}" class="btn btn-warning">Buat Jurusan</a>
            </div>
            <div class="card-body table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Logo</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>     
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($jurusan as $data)
                        <tr>
                            <td width="10px">{{ $no++}}</td>
                            <td>{{ $data->judul}}</td>
                            <td>{{ $data->sub_judul}}</td>
                            <td><img src="{{ asset($data->gambar)}}" width="30px" height="30px"> </td>
                            
                            <td>
                                <a href="{{ url('admin/jurusan/update',$data->id)}}" class="btn btn-sm btn-primary">Lihat</a>
                                <a href="{{ url('admin/jurusan/update',$data->id)}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/jurusan/delete',$data->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                   
                </table>
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