<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <label for="title">Judul Timeline</label>
            {!! Form::text('judul', null, ['class' => $errors->has('judul') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
            @if ($errors->has('judul'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('judul') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="title">Link Youtube</label>
            {!! Form::text('link_youtube', null, ['class' => $errors->has('link_youtube') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
            @if ($errors->has('link_youtube'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('link_youtube') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
                <label>Konten</label>
                {!! Form::textarea('body', null, ['id' => 'textarea', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('body'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>

        <div class="form-group">
            <label for="role">Status</label>
            {!! Form::select('status', ['aktif' => 'aktif', 'nonaktif' => 'nonaktif'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
            @if ($errors->has('status'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="role">Posisi</label>
            {!! Form::select('posisi', ['1' => '1', '2' => '2'], null, ['class' => $errors->has('posisi') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
            @if ($errors->has('posisi'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('posisi') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="title">Thumbnail</label>
            <div class="input-group">

                <span class="input-group-btn">
                    <a style="margin-top: 2px" id="lfm" data-input="featured" data-preview="holder" class="btn btn-secondary text-white">
                        <i class="mdi mdi-cloud-upload"></i> 
                    </a>
                </span>
                {!! Form::text('featured', null, ['id' => 'featured', 'class' => 'form-control', 'readonly required']) !!}
                
            </div>
            <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
        </div>
        <div class="form-group">
             <button type="submit" class="btn btn-primary">Kirim</button>
             <a href="{{ url('/admin/gallery')}}" class="btn btn-danger">Kembali</a>
        </div>
</div>

@section('assets-footer')
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready( function () {
        var route_prefix = "{{ url('laravel-filemanager') }}";
        $('#lfm').filemanager('image',{prefix: route_prefix});
    });
</script>
@endsection
    