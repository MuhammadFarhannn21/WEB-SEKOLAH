<div class="row">
<div class="col-md-9">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Tambah Post
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Judul</label>
                {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Jenis</label>
                {!! Form::select('jenis', ['Berita' => 'Berita', 'Pages' => 'Pages', 'Acara' => 'Acara'], null, ['class' => $errors->has('jenis') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                @if ($errors->has('jenis'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('jenis') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Konten</label>
                {!! Form::textarea('body', null, ['id' => 'textarea', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control']) !!}
                @if ($errors->has('body'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-header text-white bg-primary">
            Publish
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="published_at">Tanggal</label>
                {!! Form::text('published_at', date("Y-m-d H:i:s"), ['id' => 'datetime', 'class' => $errors->has('published_at') ? 'form-control is-invalid' : 'form-control', 'readonly']) !!}
                @if ($errors->has('published_at'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('published_at') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label>Status</label>
                {!! Form::select('status', ['0' => 'Draft', '1' => 'Publish'], null, ['class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                @if ($errors->has('status'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-primary pull-right">
            Publish
            </button>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header text-white bg-primary">
            Kategori
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Kategori</label>
                {!! Form::select('category_id', ['' => '-']+ App\Category::pluck('title', 'id')->all() , null, ['class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
                @if ($errors->has('category_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header text-white bg-primary">
            Featured Image
        </div>
        <div class="card-body">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="featured" data-preview="holder" class="btn btn-primary text-white">
                            <i class="fa fa-cloud-upload"></i> Choose
                        </a>
                    </span>
                    {!! Form::text('featured', null, ['id' => 'featured', 'class' => 'form-control', 'readonly']) !!}
                </div>
                <!-- if -->
                <!-- <img src="#" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;"> -->
                <!-- endif -->
                @if($post != null)
                <img id="holder" src="{{ asset($post->featured)}}" style="margin-top:15px;max-height:254px;max-width: 152px;">
                @else
                <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
                @endif
                
            </div>
        </div>
    </div>
</div>
</div>

@section('assets-footer')
<script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready( function () {
        $("#datetime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:00',
            autoclose: true
        });
        var route_prefix = "{{ url('laravel-filemanager') }}";
        $('#lfm').filemanager('image',{prefix: route_prefix});
    });
</script>
@endsection
    