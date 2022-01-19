@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pemberkasan</h4>     
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @if($uangPangkal == null)
        <div class="alert alert-warning bg-danger text-white" role="alert" style="margin-top: -10px">
            Anda Harus Membayar Uang Pangkal Terlebih Dahulu Minimal Rp. {{ number_format($jenisFormulir->minimal_uang_pangkal)}}
            Untuk Melakukan Pemberkasan Data Calon Siswa
        </div>
        @elseif($uangPangkal != null)
          @php
            $totalCicilanDiterima = 0;
            if($uangPangkal->cicilan_1_status == "Diterima")
            {
              $totalCicilanDiterima += $uangPangkal->cicilan_1_jumlah;
            }
            if($uangPangkal->cicilan_2_status == "Diterima")
            {
              $totalCicilanDiterima += $uangPangkal->cicilan_2_jumlah;
            }
            if($uangPangkal->cicilan_3_status == "Diterima")
            {
              $totalCicilanDiterima += $uangPangkal->cicilan_3_jumlah;
            }

            $totalSisa = $uangPangkal->jenisFormulir->biaya_uang_pangkal - $totalCicilanDiterima;
            $totalSudahDibayar = $jenisFormulir->biaya_uang_pangkal - $totalSisa;
          @endphp
          @if($totalSudahDibayar >= $jenisFormulir->minimal_uang_pangkal)
          <div class="card m-b-20">
              <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('pendaftar/pemberkasan') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label class="text-muted">Scan Ijazah SMP Berformat PDF</label>
                    <input type="file" class="form-control" name="ijazah_pdf" required />
                  </div>
                  @if($pemberkasan != null)
                  <embed src="{{ asset($pemberkasan->ijazah_pdf) }}" width="100%" height="375" type="application/pdf">
                  @endif
                  <div class="form-group">
                    <label class="text-muted">Pas Foto 2x3</label>
                    <input type="file" class="form-control" name="pas_foto_2_3" required />
                  </div>
                  @if($pemberkasan != null)
                  <a class="image-popup-vertical-fit" href="{{ asset($pemberkasan->pas_foto_2_3)}}">
                    <img class="img-fluid" alt="" src="{{ asset($pemberkasan->pas_foto_2_3)}}" width="145">
                  </a>
                  @endif
                  <div class="form-group">
                    <label class="text-muted">Pas Foto 3x4</label>
                    <input type="file" class="form-control" name="pas_foto_3_4" required />
                  </div>
                  @if($pemberkasan != null)
                  <a class="image-popup-vertical-fit" href="{{ asset($pemberkasan->pas_foto_3_4)}}">
                    <img class="img-fluid" alt="" src="{{ asset($pemberkasan->pas_foto_3_4)}}" width="145">
                  </a>
                  @endif
                  <div class="form-group">
                    <label class="text-muted">Scan/Foto KK pastikan Gambar Tidak Buram Wajib Berformat jpeg/jpg</label>
                    <input type="file" class="form-control" name="kk" required />
                  </div>
                  @if($pemberkasan != null)
                  <a class="image-popup-vertical-fit" href="{{ asset($pemberkasan->kk)}}">
                    <img class="img-fluid" alt="" src="{{ asset($pemberkasan->kk)}}" width="145">
                  </a>
                  @endif
                  <div class="form-group">
                    <label class="text-muted">Scan/Foto Akte Kelahiran pastikan Gambar Tidak Buram Wajib Berformat jpeg/jpg</label>
                    <input type="file" class="form-control" name="akte_kelahiran" required />
                  </div>
                  @if($pemberkasan != null)
                  <a class="image-popup-vertical-fit" href="{{ asset($pemberkasan->akte_kelahiran)}}">
                    <img class="img-fluid" alt="" src="{{ asset($pemberkasan->akte_kelahiran)}}" width="145">
                  </a>
                  @endif
                  <div class="form-group">
                    <label class="text-muted">Ukuran Baju</label>
                    <select required class="form-control" name="ukuran_baju">
                      <option value="S" {{ $pemberkasan != null ? ($pemberkasan->ukuran_baju == "S" ? "selected" : "") : "" }}>S</option>
                      <option value="M" {{ $pemberkasan != null ? ($pemberkasan->ukuran_baju == "M" ? "selected" : "") : "" }}>M</option>
                      <option value="L" {{ $pemberkasan != null ? ($pemberkasan->ukuran_baju == "L" ? "selected" : "") : "" }}>L</option>
                      <option value="XL" {{ $pemberkasan != null ? ($pemberkasan->ukuran_baju == "XL" ? "selected" : "") : "" }}>XL</option>
                      <option value="XXL" {{ $pemberkasan != null ? ($pemberkasan->ukuran_baju == "XXL" ? "selected" : "") : "" }}>XXL</option>
                      <option value="XXXXL" {{ $pemberkasan != null ? ($pemberkasan->ukuran_baju == "XXXXL" ? "selected" : "") : "" }}>XXXXL</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">Kirim</button>
                  </div>
                </form>
              </div>
          </div>
          @else
          <div class="alert alert-warning bg-danger text-white" role="alert" style="margin-top: -10px">
              Anda Harus Membayar Uang Pangkal Terlebih Dahulu Minimal Rp. {{ number_format($jenisFormulir->minimal_uang_pangkal)}}
              Untuk Melakukan Pemberkasan Data Calon Siswa Atau Jika Anda Sudah Membayar Uang Pangkal Tunggu Admin Mengkonfirmasi Pembayaran Uang Pangkal Anda
          </div>
          @endif
        @endif
    </div> 
</div> 
@endsection

@section('assets-footer')

@endsection
