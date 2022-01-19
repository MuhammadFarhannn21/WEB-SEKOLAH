<div class="row">
<div class="col-md-9">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Tambah Sound Cloud
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Judul</label>
                {!! Form::text('judul', null, ['class' => $errors->has('judul') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                @if ($errors->has('judul'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label>Lirik</label>
                {!! Form::textarea('lirik', null, ['id' => 'textarea', 'class' => $errors->has('lirik') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('lirik'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('lirik') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Publish
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="published_at">Tanggal</label>
                {!! Form::text('published_at', date("Y-m-d H:i:s"), ['id' => 'datetime', 'class' => $errors->has('published_at') ? 'form-control is-invalid' : 'form-control', 'readonly']) !!}
                @if ($errors->has('published_at'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('published_at') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Status</label>
                {!! Form::select('status', ['0' => 'Draft', '1' => 'Publish'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                @if ($errors->has('status'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-primary pull-right">
            Publish
            </button>
        </div>
    </div>
  
    <div class="card">
        <div class="card-header text-white bg-primary">
            Sound
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                   <input type="file" name="file" required class="form-control">
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>

@section('assets-footer')
<script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready( function () {
        $("#datetime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:00',
            autoclose: true
        });
    });
</script>
@endsection
    