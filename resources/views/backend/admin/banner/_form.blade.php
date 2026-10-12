<div class="row">
    <div class="col-xl-12">

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul"
                value="{{ old('judul', isset($banner) ? $banner->judul : '') }}"
                class="{{ $errors->has('judul') ? 'form-control is-invalid' : 'form-control' }}"
                required autofocus>
            @if($errors->has('judul'))
                <span class="invalid-feedback"><strong>{{ $errors->first('judul') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label>Sub Judul</label>
            <input type="text" name="sub_judul"
                value="{{ old('sub_judul', isset($banner) ? $banner->sub_judul : '') }}"
                class="{{ $errors->has('sub_judul') ? 'form-control is-invalid' : 'form-control' }}"
                required>
            @if($errors->has('sub_judul'))
                <span class="invalid-feedback"><strong>{{ $errors->first('sub_judul') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label>Posisi</label>
            <select name="posisi" class="{{ $errors->has('posisi') ? 'form-control is-invalid' : 'form-control' }}" required>
                <option value="text-center" {{ (isset($banner) && $banner->posisi == 'text-center') ? 'selected' : '' }}>text-center</option>
                <option value="text-right" {{ (isset($banner) && $banner->posisi == 'text-right') ? 'selected' : '' }}>text-right</option>
                <option value="text-left" {{ (isset($banner) && $banner->posisi == 'text-left') ? 'selected' : '' }}>text-left</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="{{ $errors->has('status') ? 'form-control is-invalid' : 'form-control' }}" required>
                <option value="DiTampilkan" {{ (isset($banner) && $banner->status == 'DiTampilkan') ? 'selected' : '' }}>DiTampilkan</option>
                <option value="DiSembunyikan" {{ (isset($banner) && $banner->status == 'DiSembunyikan') ? 'selected' : '' }}>DiSembunyikan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Banner / Gambar</label>
            <div class="input-group">
                <input type="text" name="gambar" id="gambar-banner"
                    value="{{ old('gambar', isset($banner) ? $banner->gambar : '') }}"
                    class="form-control" readonly>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="btn-gambar-banner">
                        <i class="mdi mdi-folder-image"></i> Pilih Gambar
                    </button>
                </div>
            </div>
            @if(isset($banner) && $banner->gambar)
                <img id="preview-banner" src="{{ asset($banner->gambar) }}" style="margin-top:10px; max-height:200px; border-radius:8px; display:block;">
            @else
                <img id="preview-banner" style="margin-top:10px; max-height:200px; border-radius:8px; display:none;">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/banner') }}" class="btn btn-danger">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<script>
document.getElementById('btn-gambar-banner').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('gambar-banner', 'preview-banner');
});
</script>
</script>
</script>