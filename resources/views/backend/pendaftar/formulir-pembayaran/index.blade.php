@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pembayaran Formulir</h4>     
        </div>
    </div>
</div>

<form method="post" action="{{ url('/pendaftar/pembayaran-formulir') }}" enctype="multipart/form-data">
@csrf
<div class="row">

    <div class="col-lg-12">
        @if($formulirPembayaran != null)
          @if($formulirPembayaran->status == "Menunggu Konfirmasi Admin")
          <div class="alert alert-warning bg-success text-white" role="alert" style="margin-top: -10px">
              Mohon Tunggu Admin Konfirmasi Struk Pembayaran Formulir Anda
          </div>
          @endif
        @else
        <div class="alert alert-warning bg-danger text-white" role="alert" style="margin-top: -10px">
            Silahkan Upload Struk Bukti Pembayaran Formulir Anda Ke Rekening Dibawah Sesuai Dengan
            Biaya Formulir
        </div>
        @endif

        <div class="card m-b-20">
            <div class="card-body">
             
              <div class="form-group">
                <label class="text-muted">Nama Formulir</label>
                <input type="text" class="form-control" value="{{ $jenisFormulir->nama }}" disabled />
              </div>
              <div class="form-group">
                <label class="text-muted">Tahun Ajaran</label>
                <input type="text" class="form-control" value="{{ $jenisFormulir->tahun_ajaran }}" disabled />
              </div>
              <div class="form-group">
                <label class="text-muted">Biaya Formulir</label>
                <input type="text" class="form-control" value="{{ number_format($jenisFormulir->biaya_formulir) }}" disabled />
              </div>
              <div class="form-group">
                <label class="text-muted">Nomor Rekening</label>
                <input type="text" class="form-control" value="{{ $jenisFormulir->no_rekening }}" disabled />
              </div>
              <div class="form-group">
                <label class="text-muted">Bank</label>
                <input type="text" class="form-control" value="{{ $jenisFormulir->nama_bank_rekening }}" disabled />
              </div>
              
              <div class="form-group">
                <label class="text-muted">Upload Struk Bukti Pembayaran</label>
                <input type="file" class="form-control" name="bukti_pembayaran" required />
                
              </div>
              @if($formulirPembayaran != null)
                <a class="image-popup-vertical-fit" href="{{ asset($formulirPembayaran->bukti_pembayaran)}}">
                    <img class="img-fluid" alt="" src="{{ asset($formulirPembayaran->bukti_pembayaran)}}" width="145">
                </a>
              <div class="form-group">
                <label class="text-muted">Status Konfirmasi</label>
                <input type="text" class="form-control" value="{{ $formulirPembayaran->status }}" disabled />
              </div>
              @if($formulirPembayaran->status == "Diterima")
                <div class="form-group">
                  <a href="{{ url('pendaftar/pembayaran-formulir/kwitansi') }}" target="_blank" class="btn btn-success">Download Kwitansi</a>
                </div>
              @endif
              @endif
            </div>
            
            @if($formulirPembayaran == null)
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Kirim </button>
            </div>
            @endif

            @if($formulirPembayaran != null)
              @if($formulirPembayaran->status != "Diterima")
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kirim </button>
              </div>
              @endif
            @endif
        </div>
    </div> 

   
</div> 
</form>

@endsection

@section('assets-footer')

@endsection
