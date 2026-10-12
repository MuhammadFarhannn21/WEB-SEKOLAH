<div class="row">
    <div class="col-xl-12">

        <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama"
                value="{{ old('nama', isset($mitra) ? $mitra->nama : '') }}"
                class="form-control" required autofocus
                placeholder="Contoh: PT. Telkom Indonesia">
        </div>

        <div class="form-group">
            <label>Bidang Usaha <small class="text-muted">(opsional)</small></label>
            <input type="text" name="bidang"
                value="{{ old('bidang', isset($mitra) ? $mitra->bidang : '') }}"
                class="form-control"
                placeholder="Contoh: Teknologi Informasi">
        </div>

        <div class="form-group">
            <label>Website <small class="text-muted">(opsional)</small></label>
            <input type="text" name="website"
                value="{{ old('website', isset($mitra) ? $mitra->website : '') }}"
                class="form-control"
                placeholder="Contoh: https://www.telkom.co.id">
        </div>

        <div class="form-group">
            <label>Deskripsi <small class="text-muted">(opsional)</small></label>
            <textarea name="deskripsi" class="form-control" rows="3"
                placeholder="Deskripsi singkat perusahaan...">{{ old('deskripsi', isset($mitra) ? $mitra->deskripsi : '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ (isset($mitra) && $mitra->status == 'aktif') ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ (isset($mitra) && $mitra->status == 'nonaktif') ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <label>Logo Perusahaan <small class="text-muted">(opsional)</small></label>
            <div class="input-group">
                <input type="text" name="logo" id="logo-mitra"
                    value="{{ old('logo', isset($mitra) ? $mitra->logo : '') }}"
                    class="form-control" readonly>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="btn-logo-mitra">
                        <i class="mdi mdi-folder-image"></i> Pilih Logo
                    </button>
                </div>
            </div>
            @if(isset($mitra) && $mitra->logo)
                <img id="preview-mitra" src="{{ asset($mitra->logo) }}" style="margin-top:10px; max-height:80px; border-radius:8px; display:block; background:#f8f9fa; padding:8px;">
            @else
                <img id="preview-mitra" style="margin-top:10px; max-height:80px; border-radius:8px; display:none;">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/mitra') }}" class="btn btn-danger">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<script>
document.getElementById('btn-logo-mitra').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('logo-mitra', 'preview-mitra');
});
</script>