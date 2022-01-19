@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Konfigurasi Aplikasi</h4>     
        </div>
    </div>
</div>

<form method="post" action="{{ url('/admin/aplikasi') }}">
@csrf
<div class="row">
    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label class="text-muted">Nama Sekolah</label>
                <input type="text" class="form-control" name="nama" value="{{ $aplikasi->nama }}" required />
                <input type="hidden" class="form-control" name="id" value="{{ $aplikasi->id }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Nomor Telepon</label>
                <input type="number" class="form-control" name="telepon" value="{{ $aplikasi->telepon }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $aplikasi->email }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Alamat Sekolah</label>
                <input type="text" class="form-control" name="alamat" value="{{ $aplikasi->alamat }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Waktu</label>
                <input type="text" class="form-control" name="waktu_buka" value="{{ $aplikasi->waktu_buka }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="{{ $aplikasi->keterangan }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Copyright</label>
                <input type="text" class="form-control" name="copyright" value="{{ $aplikasi->copyright }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Total Siswa</label>
                <input type="text" class="form-control" name="jumlah_siswa" value="{{ $aplikasi->jumlah_siswa }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Total Guru</label>
                <input type="text" class="form-control" name="jumlah_guru" value="{{ $aplikasi->jumlah_guru }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Total Jurusan</label>
                <input type="text" class="form-control" name="jumlah_jurusan" value="{{ $aplikasi->jumlah_jurusan }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Total Prestasi</label>
                <input type="text" class="form-control" name="jumlah_prestasi" value="{{ $aplikasi->jumlah_prestasi }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Link Maps</label>
                <input type="text" class="form-control" name="link_maps" value="{{ $aplikasi->link_maps }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Link Facebook</label>
                <input type="text" class="form-control" name="link_facebook" value="{{ $aplikasi->link_facebook }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Link Youtube</label>
                <input type="text" class="form-control" name="link_youtube" value="{{ $aplikasi->link_youtube }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Link Google+</label>
                <input type="text" class="form-control" name="link_google" value="{{ $aplikasi->link_google }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Link Instagram</label>
                <input type="text" class="form-control" name="link_instagram" value="{{ $aplikasi->link_instagram }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Judul Kompotensi</label>
                <input type="text" class="form-control" name="judul_jurusan" value="{{ $aplikasi->judul_jurusan }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Sub Judul Kompotensi</label>
                <input type="text" class="form-control" name="judul_sub_jurusan" value="{{ $aplikasi->judul_sub_jurusan }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Judul Berita</label>
                <input type="text" class="form-control" name="judul_berita" value="{{ $aplikasi->judul_berita }}" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Sub Judul Berita</label>
                <input type="text" class="form-control" name="judul_sub_berita" value="{{ $aplikasi->judul_sub_berita }}" required />
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan </button>
            </div>
        </div>
    </div> 

    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-body">
                  
                  <div class="form-group">
                    <label class="text-muted">Judul Guru</label>
                    <input type="text" class="form-control" name="judul_guru" value="{{ $aplikasi->judul_guru }}" required />
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Sub Judul Guru</label>
                    <input type="text" class="form-control" name="judul_sub_guru" value="{{ $aplikasi->judul_sub_guru }}" required />
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Judul Event</label>
                    <input type="text" class="form-control" name="judul_event" value="{{ $aplikasi->judul_event }}" required />
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Sub Judul Event</label>
                    <input type="text" class="form-control" name="judul_sub_event" value="{{ $aplikasi->judul_sub_event }}" required />
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Judul Gallery</label>
                    <input type="text" class="form-control" name="judul_gallery" value="{{ $aplikasi->judul_gallery }}" required />
                  </div>
                  <div class="form-group">  
                  <label class="text-muted">Sub Judul Gallery</label>
                    <input type="text" class="form-control" name="judul_sub_gallery" value="{{ $aplikasi->judul_sub_gallery }}" required />
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Link Google+</label>
                    <input type="text" class="form-control" name="link_google" value="{{ $aplikasi->link_google }}" required />
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Link Instagram</label>
                    <input type="text" class="form-control" name="link_instagram" value="{{ $aplikasi->link_instagram }}" required />
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Logo Admin</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <a style="margin-top: 3px" id="lfm1" data-input="featured1" data-preview="holder1" class="btn btn-primary text-white">
                              <i class="fa fa-cloud-upload"></i> Choose
                          </a>
                      </span>
                      <input type="text" name="logo_be" value="{{ $aplikasi->logo_be }}" id="featured1" class="form-control" readonly required>
                    </div>
                    <img id="holder1" src="{{ asset($aplikasi->logo_be) }}" style="margin-top:15px;max-height:54px;max-width: 52px;">
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Logo Sub Admin</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <a style="margin-top: 3px" id="lfm2" data-input="featured2" data-preview="holder2" class="btn btn-primary text-white">
                              <i class="fa fa-cloud-upload"></i> Choose
                          </a>
                      </span>
                      <input type="text" name="logo_sub_be" value="{{ $aplikasi->logo_sub_be }}" id="featured2" class="form-control" readonly required>
                    </div>
                    <img id="holder2" src="{{ asset($aplikasi->logo_sub_be) }}" style="margin-top:15px;max-height:54px;max-width: 52px;">
                  </div>
                  <div class="form-group">
                    <label class="text-muted">Logo Sekolah</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <a style="margin-top: 3px" id="lfm3" data-input="featured3" data-preview="holder3" class="btn btn-primary text-white">
                              <i class="fa fa-cloud-upload"></i> Choose
                          </a>
                      </span>
                      <input type="text" name="logo_fe" value="{{ $aplikasi->logo_fe }}" id="featured3" class="form-control" readonly required>
                    </div>
                    <img id="holder3" src="{{ asset($aplikasi->logo_fe) }}" style="margin-top:15px;max-height:54px;max-width: 52px;">
                  </div>

                  <div class="form-group">
                    <label class="text-muted">Logo Login</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <a style="margin-top: 3px" id="lfm4" data-input="featured4" data-preview="holder4" class="btn btn-primary text-white">
                              <i class="fa fa-cloud-upload"></i> Choose
                          </a>
                      </span>
                      <input type="text" name="gambar_login" value="{{ $aplikasi->gambar_login }}" id="featured4" class="form-control" readonly required>
                    </div>
                    <img id="holder4" src="{{ asset($aplikasi->gambar_login) }}" style="margin-top:15px;max-height:54px;max-width: 52px;">
                  </div>

                  <div class="form-group">
                    <label class="text-muted">Backgroud Slide Menu</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <a style="margin-top: 3px" id="lfm5" data-input="featured5" data-preview="holder5" class="btn btn-primary text-white">
                              <i class="fa fa-cloud-upload"></i> Choose
                          </a>
                      </span>
                      <input type="text" name="gambar_slider" value="{{ $aplikasi->gambar_slider }}" id="featured5" class="form-control" readonly required>
                    </div>
                    <img id="holder5" src="{{ asset($aplikasi->gambar_slider) }}" style="margin-top:15px;max-height:54px;max-width: 52px;">
                  </div>

                  <div class="form-group">
                    <label class="text-muted">Backgroud Total Data</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <a style="margin-top: 3px" id="lfm6" data-input="featured6" data-preview="holder6" class="btn btn-primary text-white">
                              <i class="fa fa-cloud-upload"></i> Choose
                          </a>
                      </span>
                      <input type="text" name="gambar_total_siswa" value="{{ $aplikasi->gambar_total_siswa }}" id="featured6" class="form-control" readonly required>
                    </div>
                    <img id="holder6" src="{{ asset($aplikasi->gambar_total_siswa) }}" style="margin-top:15px;max-height:54px;max-width: 52px;">
                  </div>

                  <div class="form-group">
                    <label class="text-muted">Backgroud Footer</label>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <a style="margin-top: 3px" id="lfm7" data-input="featured7" data-preview="holder7" class="btn btn-primary text-white">
                              <i class="fa fa-cloud-upload"></i> Choose
                          </a>
                      </span>
                      <input type="text" name="gambar_footer" value="{{ $aplikasi->gambar_footer }}" id="featured7" class="form-control" readonly required>
                    </div>
                    <img id="holder7" src="{{ asset($aplikasi->gambar_footer) }}" style="margin-top:15px;max-height:54px;max-width: 52px;">
                  </div>
            </div>
        </div>
    </div> 
</div> 
</form>

@endsection

@section('assets-footer')
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
        $(document).ready( function () {
            var route_prefix = "{{ url('laravel-filemanager') }}";
            $('#lfm1').filemanager('image',{prefix: route_prefix});
            $('#lfm2').filemanager('image',{prefix: route_prefix});
            $('#lfm3').filemanager('image',{prefix: route_prefix});
            $('#lfm4').filemanager('image',{prefix: route_prefix});
            $('#lfm5').filemanager('image',{prefix: route_prefix});
            $('#lfm6').filemanager('image',{prefix: route_prefix});
            $('#lfm7').filemanager('image',{prefix: route_prefix});
        });
</script>
@endsection
