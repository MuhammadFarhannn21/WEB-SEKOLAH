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
            <h4 class="page-title" style="margin-left: 18px;">Daftar Komentar</h4>
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Post</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>     
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($komentar as $data)
                        <tr>
                            <td width="10px">{{ $no++}}</td>
                            <td>{{ $data->name}}</td>
                            <td>{{ $data->email}}</td>
                            <td>{{ $data->body}}</td>
                            <td>{{ $data->post->title}}</td>
                            <td>{{ $data->status == 1 ? "Aktif" : "Nonaktif"}}</td>
                            <?php $tanggal=date_create($data->published_at); ?> 
                            <td>{{ date_format($tanggal,"d F Y")}}</td>
                            
                            <td>
                              @if($data->status == 0)
                                <a href="{{ url('admin/komentar/aktif',$data->id)}}" class="btn btn-sm btn-primary">Aktifkan</a>
                              @endif  

                                <a href="{{ url('admin/komentar/delete',$data->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                   
            </table>
        </div>
        <div class="card-footer">
          {{ $komentar->links()}}
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