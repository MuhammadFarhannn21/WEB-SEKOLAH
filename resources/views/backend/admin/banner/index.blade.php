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
            <h4 class="page-title" style="margin-left: 18px;">Banner</h4>
            
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Daftar Banner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Tambah Banner</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active p-3  table-responsive" id="home2" role="tabpanel">
                    <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Sub Judul</th>
                                <th>Posisi</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>     
                        <tbody>
                            <?php $no=1 ?>
                            @foreach($banners as $banner)
                            <tr>
                                <td width="10px">{{ $no++}}</td>
                                <td><img src="{{ asset($banner->gambar)}}" width="30px" height="30px"> </td>
                                <td>{{ $banner->judul}}</td>
                                <td>{{ $banner->sub_judul}}</td>
                                <td>{{ $banner->posisi}}</td>
                                <td>{{ $banner->status}}</td>
                                <td>
                                    <a href="{{ url('admin/banner/update',$banner->id)}}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/banner/delete',$banner->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                   
                    </table>
                </div>
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    {!! Form::open(['url' => 'admin/banner/store', 'method' => 'POST']) !!}
                        @include('backend.admin.banner._form')
                    {!! Form::close() !!}
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

@endsection