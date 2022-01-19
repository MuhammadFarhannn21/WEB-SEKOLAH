@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Edit User</h4>
        </div>
    </div>
</div>

{!! Form::model($user, ['url' => ['admin/users/update', $user->id], 'method' => 'PATCH']) !!}
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header text-white bg-primary">
                Edit User 
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Name</label>
                    {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="telepon">Username</label>
                    {!! Form::text('username', null, ['class' => $errors->has('username') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                    @if ($errors->has('username'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    {!! Form::email('email', null,['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    {!! Form::password('password', ['class' => $errors->has('password') ? 'form-control is-invalid' : 'form-control']) !!}
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div> 

            </div>
            <div class="card-footer bg-transparent">
                <a href="{{ url('/admin/users')}}" class="btn btn-danger">Kembali</a>
            </div>    
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header text-white bg-primary">
                Role
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Role</label>
                    {!! Form::select('role', ['Admin' => 'Admin'], null, ['class' => $errors->has('role') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                    @if ($errors->has('role'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
        </div>        
        <div class="card">
            <div class="card-header text-white bg-primary">
                Avatar
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a style="margin-top: 2px" id="lfm" data-input="featured" data-preview="holder" class="btn btn-primary text-white">
                                <i class="fa fa-cloud-upload"></i> Choose
                            </a>
                        </span>
                        {!! Form::text('photo', null, ['id' => 'featured', 'class' => 'form-control', 'readonly']) !!}
                    </div>
                    <!-- if -->
                    <!-- <img src="#" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;"> -->
                    <!-- endif -->
                    <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;margin-left: 20px">
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <button class="btn btn-primary pull-right">
                	Edit
                </button>
            </div>    
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection

@section('assets-footer')
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
        var route_prefix = "{{ url('laravel-filemanager') }}";
        $('#lfm').filemanager('image',{prefix: route_prefix});
</script>
@endsection
