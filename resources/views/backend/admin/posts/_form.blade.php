<div class="row">
<div class="col-md-9">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Tambah Post
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', isset($post) ? $post->title : '') }}"
                    class="{{ $errors->has('title') ? 'form-control is-invalid' : 'form-control' }}"
                    required autofocus>
                @if($errors->has('title'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <label>Jenis</label>
                <select name="jenis" class="{{ $errors->has('jenis') ? 'form-control is-invalid' : 'form-control' }}" required>
                    <option value="Berita" {{ (isset($post) && $post->jenis == 'Berita') ? 'selected' : '' }}>Berita</option>
                    <option value="Pages" {{ (isset($post) && $post->jenis == 'Pages') ? 'selected' : '' }}>Pages</option>
                    <option value="Acara" {{ (isset($post) && $post->jenis == 'Acara') ? 'selected' : '' }}>Acara</option>
                </select>
            </div>
            <div class="form-group">
                <label>Konten</label>
                <textarea name="body" id="textarea"
                    class="{{ $errors->has('body') ? 'form-control is-invalid' : 'form-control' }}">{{ old('body', isset($post) ? $post->body : '') }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="card">
        <div class="card-header text-white bg-primary">Publish</div>
        <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" name="published_at" id="datetime"
                    value="{{ old('published_at', isset($post) ? $post->published_at : date('Y-m-d H:i:s')) }}"
                    class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="{{ $errors->has('status') ? 'form-control is-invalid' : 'form-control' }}" required>
                    <option value="0" {{ (isset($post) && $post->status == '0') ? 'selected' : '' }}>Draft</option>
                    <option value="1" {{ (isset($post) && $post->status == '1') ? 'selected' : '' }}>Publish</option>
                </select>
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <button type="submit" class="btn btn-primary pull-right">Publish</button>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header text-white bg-primary">Kategori</div>
        <div class="card-body">
            <div class="form-group">
                <select name="category_id" class="{{ $errors->has('category_id') ? 'form-control is-invalid' : 'form-control' }}" required>
                    <option value="">-</option>
                    @foreach(\App\Category::all() as $cat)
                        <option value="{{ $cat->id }}" {{ (isset($post) && $post->category_id == $cat->id) ? 'selected' : '' }}>
                            {{ $cat->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header text-white bg-primary">Featured Image</div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="featured" id="featured-post"
                        value="{{ old('featured', isset($post) ? $post->featured : '') }}"
                        class="form-control" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" id="btn-featured-post">
                            <i class="fa fa-folder-open"></i> Pilih
                        </button>
                    </div>
                </div>
                @if(isset($post) && $post->featured)
                    <img id="preview-post" src="{{ asset($post->featured) }}" style="margin-top:15px; max-height:254px; max-width:152px; display:block;">
                @else
                    <img id="preview-post" style="margin-top:15px; max-height:254px; max-width:152px; display:none;">
                @endif
            </div>
        </div>
    </div>
</div>
</div>

@section('assets-footer')
<script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#datetime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:00',
            autoclose: true
        });
    });

    document.getElementById('btn-featured-post').addEventListener('click', function(e) {
    e.preventDefault();
    openFileUpload('featured-post', 'preview-post');
    });
</script>
@endsection