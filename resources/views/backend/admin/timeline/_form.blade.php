<div class="row">
    <div class="col-xl-12">

        <div class="form-group">
            <label>Judul Timeline</label>
            <input type="text" name="judul"
                value="{{ old('judul', isset($timeline) ? $timeline->judul : '') }}"
                class="{{ $errors->has('judul') ? 'form-control is-invalid' : 'form-control' }}"
                required autofocus>
            @if($errors->has('judul'))
                <span class="invalid-feedback"><strong>{{ $errors->first('judul') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label>Link Video <small class="text-muted">(YouTube / Instagram / TikTok)</small></label>
            <input type="text" name="link_youtube"
                value="{{ old('link_youtube', isset($timeline) ? $timeline->link_youtube : '') }}"
                class="{{ $errors->has('link_youtube') ? 'form-control is-invalid' : 'form-control' }}"
                required>
        </div>

        <<div class="form-group">
             <label>Konten <small class="text-muted">(opsional)</small></label>
             <textarea name="body" class="form-control" rows="3"
        placeholder="Deskripsi singkat video...">{{ old('body', isset($timeline) ? $timeline->body : '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="{{ $errors->has('status') ? 'form-control is-invalid' : 'form-control' }}" required>
                <option value="aktif" {{ (isset($timeline) && $timeline->status == 'aktif') ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ (isset($timeline) && $timeline->status == 'nonaktif') ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <label>Posisi</label>
            <select name="posisi" class="{{ $errors->has('posisi') ? 'form-control is-invalid' : 'form-control' }}" required>
                <option value="1" {{ (isset($timeline) && $timeline->posisi == '1') ? 'selected' : '' }}>1</option>
                <option value="2" {{ (isset($timeline) && $timeline->posisi == '2') ? 'selected' : '' }}>2</option>
                <option value="3" {{ (isset($timeline) && $timeline->posisi == '3') ? 'selected' : '' }}>3</option>
                <option value="4" {{ (isset($timeline) && $timeline->posisi == '4') ? 'selected' : '' }}>4</option>
                <option value="5" {{ (isset($timeline) && $timeline->posisi == '5') ? 'selected' : '' }}>5</option>
            </select>
        </div>

        <div class="form-group">
            <label>Thumbnail</label>
            <div class="input-group">
                <input type="text" name="featured" id="featured-timeline"
                    value="{{ old('featured', isset($timeline) ? $timeline->featured : '') }}"
                    class="form-control" readonly>
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" id="btn-featured-timeline">
                        <i class="mdi mdi-folder-image"></i> Pilih Thumbnail
                    </button>
                </div>
            </div>
            @if(isset($timeline) && $timeline->featured)
                <img id="preview-timeline" src="{{ asset($timeline->featured) }}" style="margin-top:10px; max-height:200px; border-radius:8px; display:block;">
            @else
                <img id="preview-timeline" style="margin-top:10px; max-height:200px; border-radius:8px; display:none;">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan
            </button>
            <a href="{{ url('/admin/timeline') }}" class="btn btn-danger">
                <i class="mdi mdi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<script>
document.getElementById('btn-featured-timeline').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('featured-timeline', 'preview-timeline');
});
</script>