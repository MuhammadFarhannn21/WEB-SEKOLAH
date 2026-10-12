@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Edit Timeline Videos</h4>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile2" role="tab">Edit Timeline</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane p-3 active" id="profile2" role="tabpanel">
                    <form action="{{ url('admin/timeline/update', $timeline->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('backend.admin.timeline._form')
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
@endsection