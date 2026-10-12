<div class="row">
    <div class="col-xl-12">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama"
                value="{{ old('nama', isset($kalimat) ? $kalimat->nama : '') }}"
                class="{{ $errors->has('nama') ? 'form-control is-invalid' : 'form-control' }}"
                required autofocus>
            @if($errors->has('nama'))
                <span class="invalid-feedback"><strong>{{ $errors->first('nama') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label>Kalimat / Quotes</label>
            <input type="text" name="kalimat"
                value="{{ old('kalimat', isset($kalimat) ? $kalimat->kalimat : '') }}"
                class="{{ $errors->has('kalimat') ? 'form-control is-invalid' : 'form-control' }}"
                required>
            @if($errors->has('kalimat'))
                <span class="invalid-feedback"><strong>{{ $errors->first('kalimat') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label>Foto</label>
            <div class="input-group">
                <input type="text" name="gambar" id="gambar-kalimat"
                    value="{{ old('gambar', isset($kalimat) ? $kalimat->gambar : '') }}"
                    class="form-control" readonly>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="btn-gambar-kalimat">
                        <i class="mdi mdi-folder-image"></i> Pilih Foto
                    </button>
                </div>
            </div>
            @if(isset($kalimat) && $kalimat->gambar)
                <img id="preview-kalimat" src="{{ asset($kalimat->gambar) }}" style="margin-top:10px; max-height:150px; border-radius:8px; display:block;">
            @else
                <img id="preview-kalimat" style="margin-top:10px; max-height:150px; border-radius:8px; display:none;">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/kalimat') }}" class="btn btn-danger">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<script>
document.getElementById('btn-gambar-kalimat').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('gambar-kalimat', 'preview-kalimat');
});
</script>