@extends('backend.layouts.master')

@section('assets-header')
<link href="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left:18px;">Data Ekstrakurikuler</h4>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Daftar Ekstrakurikuler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab">Tambah Ekstrakurikuler</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active p-3 table-responsive" id="home2" role="tabpanel">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Pembina</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($data as $ekskul)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if($ekskul->foto)
                                    <img src="{{ asset($ekskul->foto) }}" width="50px" height="50px" style="border-radius:6px; object-fit:cover;">
                                    @else
                                    <span class="badge badge-secondary">No Photo</span>
                                    @endif
                                </td>
                                <td>{{ $ekskul->nama }}</td>
                                <td>{{ $ekskul->pembina ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-{{ $ekskul->status == 'aktif' ? 'success' : 'danger' }}">
                                        {{ $ekskul->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ url('admin/ekstrakurikuler/update', $ekskul->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/ekstrakurikuler/delete', $ekskul->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane p-3" id="profile2" role="tabpanel">
                    <form action="{{ url('admin/ekstrakurikuler/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('backend.admin.ekstrakurikuler._form')
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