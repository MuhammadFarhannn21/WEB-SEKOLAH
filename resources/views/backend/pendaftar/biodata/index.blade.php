@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Biodata Diri</h4>     
        </div>
    </div>
</div>

<form method="post" action="{{ url('/pendaftar/biodata') }}">
@csrf
<div class="row">

    <div class="col-lg-12">
        <div class="alert alert-warning bg-primary text-white" role="alert" style="margin-top: -10px">
            Pastikan Biodata Diri Anda Sudah Benar Dan Tidak Ada Kesalahan Data
        </div>

        <div class="card m-b-20">
            <div class="card-body">
             
              <div class="form-group">
                <label class="text-muted">Username</label>
                <input type="text" class="form-control" value="{{ Auth::user()->username }}" disabled />
              </div>
              <div class="form-group">
                <label class="text-muted">Email</label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled />
              </div>
              <div class="form-group">
                <label class="text-muted">Password</label>
                <input type="text" class="form-control" name="password"  />
              </div>
              <div class="form-group">
                <label class="text-muted">Nama Lengkap</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Telepon</label>
                <input type="text" class="form-control" value="{{ Auth::user()->telepon }}" name="telepon" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Tempat, Tanggal Lahir</label>
                <input type="text" class="form-control" value="{{ Auth::user()->tempat_tanggal_lahir }}" name="tempat_tanggal_lahir" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" required>
                  <option value="L" {{ Auth::user()->jenis_kelamin == "L" ? "selected" : "" }}>Laki-laki</option>
                  <option value="P" {{ Auth::user()->jenis_kelamin == "P" ? "selected" : "" }}>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label class="text-muted">Agama</label>
                <input type="text" class="form-control" value="{{ Auth::user()->agama }}" name="agama" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Asal Sekolah</label>
                <input type="text" class="form-control" value="{{ Auth::user()->asal_sekolah }}" name="asal_sekolah" required />
              </div>
              <div class="form-group">
                <label class="text-muted">Alamat Rumah</label>
                <input type="text" class="form-control" value="{{ Auth::user()->alamat_rumah }}" name="alamat_rumah" required />
              </div>
            </div>
            
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Kirim </button>
            </div>
        </div>
    </div> 

   
</div> 
</form>

@endsection

@section('assets-footer')

@endsection
