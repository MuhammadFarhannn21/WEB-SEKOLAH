@extends('backend.layouts.master')


@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">File Dokumen</h4>
            
        </div>
    </div>
</div>


<div class="col-sm-12">
{!! Form::open(['url' => 'admin/dokumen/create', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    @include('backend.admin.dokumen._form')
{!! Form::close() !!}
</div>
</div>
@endsection

