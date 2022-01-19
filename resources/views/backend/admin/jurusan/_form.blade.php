<div class="row">
<div class="col-md-9">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Tambah Jurusan
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="sub_judul">Judul</label>
                {!! Form::text('judul', null, ['class' => $errors->has('judul') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                @if ($errors->has('judul'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="sub_judul">Sub Judul</label>
                {!! Form::text('sub_judul', null, ['class' => $errors->has('sub_judul') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                @if ($errors->has('sub_judul'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('sub_judul') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Konten</label>
                {!! Form::textarea('keterangan', null, ['id' => 'textarea', 'class' => $errors->has('keterangan') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('keterangan'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Logo Jurusan
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="featured" data-preview="holder" class="btn btn-primary text-white">
                            <i class="fa fa-cloud-upload"></i> Choose
                        </a>
                    </span>
                    {!! Form::text('gambar', null, ['id' => 'featured', 'class' => 'form-control', 'readonly']) !!}
                </div>
                <!-- if -->
                <!-- <img src="#" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;"> -->
                <!-- endif -->
                @if($jurusan != null)
                <img id="holder" src="{{ asset($jurusan->gambar)}}" style="margin-top:15px;max-height:254px;max-width: 152px;">
                @else
                <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
                @endif
                
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-primary pull-right">
            Kirim
            </button>
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
        var route_prefix = "{{ url('laravel-filemanager') }}";
        $('#lfm').filemanager('image',{prefix: route_prefix});
    });
</script>
@endsection
    