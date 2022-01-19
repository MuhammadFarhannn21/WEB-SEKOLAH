<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <label for="title">Jabatan</label>
            {!! Form::text('nama', null, ['class' => $errors->has('nama') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
            @if ($errors->has('nama'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="title">Nama Guru</label>
            {!! Form::text('mata_pelajaran', null, ['class' => $errors->has('mata_pelajaran') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
            @if ($errors->has('mata_pelajaran'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('mata_pelajaran') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="title">Periode </label>
            {!! Form::text('periode', null, ['class' => $errors->has('periode') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
            @if ($errors->has('periode'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('periode') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="title">Pesan</label>
            {!! Form::text('pesan', null, ['class' => $errors->has('pesan') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
            @if ($errors->has('pesan'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('pesan') }}</strong>
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
            <label for="title">Foto Guru</label>
            <div class="input-group">

                <span class="input-group-btn">
                    <a style="margin-top: 2px" id="lfm" data-input="featured" data-preview="holder" class="btn btn-secondary text-white">
                        <i class="mdi mdi-cloud-upload"></i> 
                    </a>
                </span>
                {!! Form::text('gambar', null, ['id' => 'featured', 'class' => 'form-control', 'readonly required']) !!}
                
            </div>
            <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
        </div>
        <div class="form-group">
             <button type="submit" class="btn btn-primary">Kirim</button>
             <a href="{{ url('/admin/guruterbaik')}}" class="btn btn-danger">Kembali</a>
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
    