<div class="row">
    <div class="col-xl-12">

        <div class="form-group">
            <label>Nama Kegiatan</label>
            <input type="text" name="nama"
                value="{{ old('nama', isset($gallery) ? $gallery->nama : '') }}"
                class="{{ $errors->has('nama') ? 'form-control is-invalid' : 'form-control' }}"
                required autofocus>
            @if($errors->has('nama'))
                <span class="invalid-feedback"><strong>{{ $errors->first('nama') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="{{ $errors->has('status') ? 'form-control is-invalid' : 'form-control' }}" required>
                <option value="aktif" {{ (isset($gallery) && $gallery->status == 'aktif') ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ (isset($gallery) && $gallery->status == 'nonaktif') ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <div class="input-group">
                <input type="text" name="gambar" id="gambar-gallery"
                    value="{{ old('gambar', isset($gallery) ? $gallery->gambar : '') }}"
                    class="form-control" readonly>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="btn-gambar-gallery">
                        <i class="mdi mdi-folder-image"></i> Pilih Foto
                    </button>
                </div>
            </div>
            @if(isset($gallery) && $gallery->gambar)
                <img id="preview-gallery" src="{{ asset($gallery->gambar) }}" style="margin-top:10px; max-height:200px; border-radius:8px; display:block;">
            @else
                <img id="preview-gallery" style="margin-top:10px; max-height:200px; border-radius:8px; display:none;">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/gallery') }}" class="btn btn-danger">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<script>
document.getElementById('btn-gambar-gallery').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('gambar-gallery', 'preview-gallery');
});
</script>