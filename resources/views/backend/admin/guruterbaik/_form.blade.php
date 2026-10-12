<div class="row">
    <div class="col-xl-12">

        {{-- Jabatan --}}
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="nama"
                value="{{ old('nama', isset($guruterbaik) ? $guruterbaik->nama : '') }}"
                class="{{ $errors->has('nama') ? 'form-control is-invalid' : 'form-control' }}"
                required autofocus>
            @if($errors->has('nama'))
                <span class="invalid-feedback"><strong>{{ $errors->first('nama') }}</strong></span>
            @endif
        </div>

        {{-- Nama Lengkap --}}
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="mata_pelajaran"
                value="{{ old('mata_pelajaran', isset($guruterbaik) ? $guruterbaik->mata_pelajaran : '') }}"
                class="{{ $errors->has('mata_pelajaran') ? 'form-control is-invalid' : 'form-control' }}"
                required>
            @if($errors->has('mata_pelajaran'))
                <span class="invalid-feedback"><strong>{{ $errors->first('mata_pelajaran') }}</strong></span>
            @endif
        </div>

        {{-- Tipe --}}
        <div class="form-group">
            <label>Tipe</label>
            <select name="tipe" class="{{ $errors->has('tipe') ? 'form-control is-invalid' : 'form-control' }}" required>
                <option value="Guru" {{ (isset($guruterbaik) && $guruterbaik->tipe == 'Guru') ? 'selected' : '' }}>Guru / Tenaga Pengajar</option>
                <option value="Staff" {{ (isset($guruterbaik) && $guruterbaik->tipe == 'Staff') ? 'selected' : '' }}>Staff / Tenaga Kependidikan</option>
            </select>
            @if($errors->has('tipe'))
                <span class="invalid-feedback"><strong>{{ $errors->first('tipe') }}</strong></span>
            @endif
        </div>

        {{-- Lulusan --}}
        <div class="form-group">
            <label>Lulusan <small class="text-muted">(opsional)</small></label>
            <input type="text" name="lulusan"
                value="{{ old('lulusan', isset($guruterbaik) ? $guruterbaik->lulusan : '') }}"
                class="form-control"
                placeholder="Contoh: Universitas Indonesia">
        </div>

        {{-- Periode --}}
        <div class="form-group">
            <label>Periode</label>
            <input type="text" name="periode"
                value="{{ old('periode', isset($guruterbaik) ? $guruterbaik->periode : '') }}"
                class="{{ $errors->has('periode') ? 'form-control is-invalid' : 'form-control' }}"
                required>
            @if($errors->has('periode'))
                <span class="invalid-feedback"><strong>{{ $errors->first('periode') }}</strong></span>
            @endif
        </div>

        {{-- Pesan --}}
        <div class="form-group">
            <label>Pesan / Motto <small class="text-muted">(opsional)</small></label>
            <input type="text" name="pesan"
                value="{{ old('pesan', isset($guruterbaik) ? $guruterbaik->pesan : '') }}"
                class="form-control"
                placeholder="Motto atau pesan inspiratif">
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="{{ $errors->has('status') ? 'form-control is-invalid' : 'form-control' }}" required>
                <option value="aktif" {{ (isset($guruterbaik) && $guruterbaik->status == 'aktif') ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ (isset($guruterbaik) && $guruterbaik->status == 'nonaktif') ? 'selected' : '' }}>Non Aktif</option>
            </select>
            @if($errors->has('status'))
                <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
            @endif
        </div>

        {{-- Foto --}}
        <div class="form-group">
            <label>Foto</label>
            <div class="input-group">
                <input type="text" name="gambar" id="gambar"
                    value="{{ old('gambar', isset($guruterbaik) ? $guruterbaik->gambar : '') }}"
                    class="form-control" readonly>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="btn-gambar">
                        <i class="mdi mdi-folder-image"></i> Pilih Foto
                    </button>
                </div>
            </div>
            @if(isset($guruterbaik) && $guruterbaik->gambar)
            <img id="preview-foto"
                src="{{ \Illuminate\Support\Str::startsWith($guruterbaik->gambar, 'http') ? $guruterbaik->gambar : asset($guruterbaik->gambar) }}"
                style="margin-top:10px; max-height:150px; border-radius:8px; display:block;">
            @else
            <img id="preview-foto" style="margin-top:10px; max-height:150px; border-radius:8px; display:none;">
            @endif
        </div>

        {{-- Tombol --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/guruterbaik') }}" class="btn btn-danger">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>

    </div>
</div>

<script>
document.getElementById('btn-gambar').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('gambar', 'preview-foto');
});

var inputId = '';
function fmSetLink(url) {
    // Ambil hanya path setelah /storage/
    var path = '';
    if (url.indexOf('/storage/') !== -1) {
        path = 'storage/' + url.split('/storage/')[1];
    } else {
        var baseUrl = window.location.origin;
        path = url.replace(baseUrl, '').replace(/^\//, '');
    }
    document.getElementById(inputId).value = path;
    document.getElementById('preview-foto').src = url;
    document.getElementById('preview-foto').style.display = 'block';
}
</script>