<div class="row">
<div class="col-md-9">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Tambah Jurusan
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul"
                    value="{{ old('judul', isset($jurusan) ? $jurusan->judul : '') }}"
                    class="{{ $errors->has('judul') ? 'form-control is-invalid' : 'form-control' }}"
                    required autofocus>
                @if($errors->has('judul'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('judul') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <label>Sub Judul</label>
                <input type="text" name="sub_judul"
                    value="{{ old('sub_judul', isset($jurusan) ? $jurusan->sub_judul : '') }}"
                    class="{{ $errors->has('sub_judul') ? 'form-control is-invalid' : 'form-control' }}"
                    required>
                @if($errors->has('sub_judul'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('sub_judul') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <label>Keterangan / Konten</label>
                <textarea name="keterangan" id="textarea"
                    class="{{ $errors->has('keterangan') ? 'form-control is-invalid' : 'form-control' }}"
                    rows="6">{{ old('keterangan', isset($jurusan) ? $jurusan->keterangan : '') }}</textarea>
                @if($errors->has('keterangan'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('keterangan') }}</strong></span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Foto / Logo Jurusan
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="gambar" id="gambar-jurusan"
                        value="{{ old('gambar', isset($jurusan) ? $jurusan->gambar : '') }}"
                        class="form-control" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="btn-gambar-jurusan">
                            <i class="fa fa-folder-open"></i>
                        </button>
                    </div>
                </div>
                @if(isset($jurusan) && $jurusan->gambar)
                    <img id="preview-jurusan" src="{{ asset($jurusan->gambar) }}" style="margin-top:15px; max-height:254px; max-width:152px; display:block;">
                @else
                    <img id="preview-jurusan" style="margin-top:15px; max-height:254px; max-width:152px; display:none;">
                @endif
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
        </div>
    </div>
</div>
</div>

<script>
document.getElementById('btn-gambar-jurusan').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('gambar-jurusan', 'preview-jurusan');
});
</script>