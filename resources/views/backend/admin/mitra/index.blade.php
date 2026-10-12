@extends('backend.layouts.master')

@section('assets-header')
<link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left:18px;">Mitra Perusahaan BKK</h4>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Daftar Mitra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Tambah Mitra</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active p-3 table-responsive" id="home2" role="tabpanel">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Nama Perusahaan</th>
                                <th>Bidang</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($data as $mitra)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if($mitra->logo)
                                    <img src="{{ asset($mitra->logo) }}" width="50px" height="50px" style="border-radius:6px; object-fit:contain; background:#f8f9fa; padding:4px;">
                                    @else
                                    <div style="width:50px; height:50px; background:#f0f4ff; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                        <i class="fa fa-building" style="color:#1a73e8;"></i>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $mitra->nama }}</td>
                                <td>{{ $mitra->bidang ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-{{ $mitra->status == 'aktif' ? 'success' : 'danger' }}">
                                        {{ $mitra->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ url('admin/mitra/update', $mitra->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/mitra/delete', $mitra->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    <form action="{{ url('admin/mitra/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('backend.admin.mitra._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('assets-footer')
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/pages/datatables2.init.js') }}"></script>
@endsection