@extends('backend.layouts.master')

@section('assets-header')
<link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Data Guru & Staff</h4>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">
                        <i class="mdi mdi-account-multiple"></i> Daftar Guru & Staff
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">
                        <i class="mdi mdi-plus"></i> Tambah Data
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                {{-- Daftar --}}
                <div class="tab-pane active p-3 table-responsive" id="home2" role="tabpanel">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Foto</th>
                                <th>Tipe</th>
                                <th>Jabatan</th>
                                <th>Nama Lengkap</th>
                                <th>Lulusan</th>
                                <th>Periode</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($data as $guruterbaik)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if($guruterbaik->gambar)
                                    <img src="{{ asset($guruterbaik->gambar) }}" width="40px" height="40px" style="border-radius:50%; object-fit:cover;">
                                    @else
                                    <div style="width:40px; height:40px; border-radius:50%; background:#1a73e8; display:flex; align-items:center; justify-content:center; color:#fff; font-size:12px; font-weight:700;">
                                        {{ strtoupper(substr($guruterbaik->mata_pelajaran, 0, 1)) }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <span style="background:{{ $guruterbaik->tipe == 'Guru' ? '#1a73e8' : '#0F6E56' }}; color:#fff; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600;">
                                        {{ $guruterbaik->tipe ?? 'Guru' }}
                                    </span>
                                </td>
                                <td>{{ $guruterbaik->nama }}</td>
                                <td>{{ $guruterbaik->mata_pelajaran }}</td>
                                <td>{{ $guruterbaik->lulusan ?? '-' }}</td>
                                <td>{{ $guruterbaik->periode }}</td>
                                <td>
                                    <span style="background:{{ $guruterbaik->status == 'aktif' ? '#0F6E56' : '#dc3545' }}; color:#fff; padding:3px 10px; border-radius:20px; font-size:11px;">
                                        {{ $guruterbaik->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ url('admin/guruterbaik/update', $guruterbaik->id) }}" class="btn btn-sm btn-success">
                                        <i class="mdi mdi-pencil"></i> Edit
                                    </a>
                                    <a href="{{ url('admin/guruterbaik/delete', $guruterbaik->id) }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">
                                        <i class="mdi mdi-delete"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Tambah --}}
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    <form action="{{ url('admin/guruterbaik/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('backend.admin.guruterbaik._form')
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
<script src="{{ asset('backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/pages/datatables2.init.js') }}"></script>
@endsection