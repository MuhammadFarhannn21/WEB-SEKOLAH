<div class="row">
    <div class="col-xl-12">

        <div class="form-group">
            <label>Nama Fasilitas</label>
            <input type="text" name="nama"
                value="{{ old('nama', isset($fasilitas) ? $fasilitas->nama : '') }}"
                class="{{ $errors->has('nama') ? 'form-control is-invalid' : 'form-control' }}"
                required autofocus>
            @if($errors->has('nama'))
                <span class="invalid-feedback"><strong>{{ $errors->first('nama') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label>Deskripsi <small class="text-muted">(opsional)</small></label>
            <textarea name="deskripsi" class="form-control" rows="4"
                placeholder="Deskripsi fasilitas...">{{ old('deskripsi', isset($fasilitas) ? $fasilitas->deskripsi : '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ (isset($fasilitas) && $fasilitas->status == 'aktif') ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ (isset($fasilitas) && $fasilitas->status == 'nonaktif') ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <div class="input-group">
                <input type="text" name="foto" id="foto-fasilitas"
                    value="{{ old('foto', isset($fasilitas) ? $fasilitas->foto : '') }}"
                    class="form-control" readonly>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="btn-foto-fasilitas">
                        <i class="mdi mdi-folder-image"></i> Pilih Foto
                    </button>
                </div>
            </div>
            @if(isset($fasilitas) && $fasilitas->foto)
                <img id="preview-fasilitas" src="{{ asset($fasilitas->foto) }}" style="margin-top:10px; max-height:150px; border-radius:8px; display:block;">
            @else
                <img id="preview-fasilitas" style="margin-top:10px; max-height:150px; border-radius:8px; display:none;">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/fasilitas') }}" class="btn btn-danger">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<script>
document.getElementById('btn-foto-fasilitas').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('foto-fasilitas', 'preview-fasilitas');
});
</script>