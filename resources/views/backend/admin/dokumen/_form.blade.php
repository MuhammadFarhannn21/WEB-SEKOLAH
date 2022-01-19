<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Tambah File Dokumen
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
                <div class="input-group">
                   <input type="file" name="file" required class="form-control">
                </div>
                
            </div>
            <div class="card-footer bg-transparent">
            <button class="btn btn-primary pull-right">
            Publish
            </button>
        </div>
        </div>
    </div>
</div>

</div>

    