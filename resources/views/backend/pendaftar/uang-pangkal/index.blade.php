@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Pembayaran Uang Pangkal</h4>     
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
    	@if($formulir == null)
    	<div class="alert alert-warning bg-danger text-white" role="alert" style="margin-top: -10px">
            Halaman Ini Tidak Bisa Di Akses Sebelum Anda Mengisi Formulir Calon Siswa
        </div>
        @else
        <div class="alert alert-warning bg-danger	 text-white" role="alert" style="margin-top: -10px">
            Silahkan Bayar Uang Pangkal Sesuai Dengan Nominal Dibawah Dapat Dicicil maksimal 3 kali. Harap Diketahui Bahwa
            Jumlah Yang Sudah Dibayar adalah ketika bukti pembayaran cicilan sudah di konfirmasi dan diterima oleh admin.
        </div>
        <div class="card m-b-20">
              
              <div class="card-body">
              	  <div class="row">
              	  	<div class="col-md-12">
          	  		  <div class="form-group">
		                <label class="text-muted">Tahun Ajaran</label>
		                <input type="text" class="form-control" value="{{ $jenisFormulir->tahun_ajaran }}" disabled />
		              </div>
		              <div class="form-group">
		                <label class="text-muted">Biaya Uang Pangkal <a href="{{url('static/keterangan_uang_pangkal.jpg')}}" class="text-primary" target="_blank">(Detail Uang Pangkal)</a></label>
		                <input type="text" class="form-control" value="{{ number_format($jenisFormulir->biaya_uang_pangkal) }}" disabled />
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
                    <label class="text-muted">Terakhir Di Tunaikan Bulan</label>
                    <input type="text" class="form-control" value="Juni 2020" disabled />
                  </div>

                  @if($uangPangkal != null)
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

                    <div class="form-group">
                      <label class="text-muted">Jumlah Yang Sudah Dibayar</label>
                      <input type="text" class="form-control" value="{{ number_format($totalSudahDibayar) }}"  disabled />
                    </div>
                    <div class="form-group">
                      <label class="text-muted">Jumlah Yang Belum Dibayar</label>
                      <input type="text" class="form-control" value="{{ number_format($totalSisa) }}"  disabled />
                    </div>
                      </div>
                    </div>
                  @endif
		             

                  <!-- Nav tabs -->
                  <ul class="nav nav-pills nav-justified" role="tablist">
                      <li class="nav-item waves-effect waves-light">
                          <a class="nav-link  active show" data-toggle="tab" href="#step-1" role="tab" aria-selected="false">Cicilan 1</a>
                      </li>
                      <li class="nav-item waves-effect waves-light">
                          <a class="nav-link" data-toggle="tab" href="#step-2" role="tab" aria-selected="true">Cicilan 2</a>
                      </li>
                      <li class="nav-item waves-effect waves-light">
                          <a class="nav-link" data-toggle="tab" href="#step-4" role="tab" aria-selected="false">Cicilan 3</a>
                      </li>
                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div class="tab-pane p-3 active show" id="step-1" role="tabpanel">
                    		<form action="{{url('/pendaftar/pembayaran-uang-pangkal')}}" method="POST" enctype="multipart/form-data"> 
                    		   @csrf
	                      	 <div class="form-group">
                              <input type="hidden" name="cicilan" value="1">
      				                <label class="text-muted">Jumlah Yang Akan Dibayar</label>
      				                <input type="text" id="inputku" name="jumlah_cicilan" value="{{ $uangPangkal != null ? $uangPangkal->cicilan_1_jumlah : "" }}" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" required minlength="{{$jenisFormulir->minimal_uang_pangkal}}" />
      				                <label class="text-danger">Minimal Di Cicilan Pertama Dibayar Sebesar Rp. {{ number_format($jenisFormulir->minimal_uang_pangkal) }}</label>
      				             </div>
	                       	 <div class="form-group">
      				                <label class="text-muted">Upload Struk Bukti Pembayaran</label>
      				                <input type="file" class="form-control" name="bukti_pembayaran" required />
      				             </div>
                           @if($uangPangkal != null)
                           <a class="image-popup-vertical-fit" href="{{ asset($uangPangkal->cicilan_1_bukti)}}">
                              <img class="img-fluid" alt="" src="{{ asset($uangPangkal->cicilan_1_bukti)}}" width="145">
                           </a>
                           <div class="form-group">
                              <label class="text-muted">Status Pembayaran</label>
                              <input type="text" class="form-control" value="{{ $uangPangkal->cicilan_1_status }}" disabled />
                           </div>
                           <div class="form-group">
                              <label class="text-muted">Tanggal Pembayaran</label>
                              <input type="text" class="form-control" value="{{ $uangPangkal->cicilan_1_tanggal->format('d-m-Y H:i:s') }}" disabled />
                           </div>
                            {{-- cicilan 1 --}}
                            @if($uangPangkal->cicilan_1_status == "Diterima")
                              <div class="form-group">
                                <a href="{{ url('pendaftar/pembayaran-uang-pangkal/kwitansi','1') }}" target="_blank" class="btn btn-success">Download Kwitansi</a>
                              </div>
                            @endif
                           @endif

                           @if($uangPangkal == null)
      				             <div class="form-group">
      					              <button type="submit" class="btn btn-primary">Kirim </button>
      				             </div>
                           @else
                            @if($uangPangkal != null)
                              @if($uangPangkal->cicilan_1_status == "Ditolak")
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Kirim </button>
                               </div>
                              @endif
                            @endif
                           @endif
  		            	    </form>
                      </div>
                      <div class="tab-pane p-3" id="step-2" role="tabpanel">
                        @if($uangPangkal != null)
                          @if($uangPangkal->cicilan_1_jumlah != null)
                          <form action="{{url('/pendaftar/pembayaran-uang-pangkal')}}" method="POST" enctype="multipart/form-data"> 
                              @csrf
                               <div class="form-group">
                                  <input type="hidden" name="cicilan" value="2">
                                  <label class="text-muted">Jumlah Yang Akan Dibayar</label>
                                  <input type="text" id="inputku" name="jumlah_cicilan" value="{{ $uangPangkal != null ? $uangPangkal->cicilan_2_jumlah : "" }}" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" required minlength="{{$jenisFormulir->minimal_uang_pangkal}}" />
                               </div>
                               <div class="form-group">
                                  <label class="text-muted">Upload Struk Bukti Pembayaran</label>
                                  <input type="file" class="form-control" name="bukti_pembayaran" required />
                               </div>
                               @if($uangPangkal->cicilan_2_jumlah != null)
                               <a class="image-popup-vertical-fit" href="{{ asset($uangPangkal->cicilan_2_bukti)}}">
                                  <img class="img-fluid" alt="" src="{{ asset($uangPangkal->cicilan_2_bukti)}}" width="145">
                               </a>
                               <div class="form-group">
                                  <label class="text-muted">Status Pembayaran</label>
                                  <input type="text" class="form-control" value="{{ $uangPangkal->cicilan_2_status }}" disabled />
                               </div>
                               <div class="form-group">
                                  <label class="text-muted">Tanggal Pembayaran</label>
                                  <input type="text" class="form-control" value="{{ $uangPangkal->cicilan_2_tanggal->format('d-m-Y H:i:s') }}" disabled />
                               </div>
                               {{-- cicilan 2 --}}
                                @if($uangPangkal->cicilan_2_status == "Diterima")
                                  <div class="form-group">
                                    <a href="{{ url('pendaftar/pembayaran-uang-pangkal/kwitansi','2') }}" target="_blank" class="btn btn-success">Download Kwitansi</a>
                                  </div>
                                @endif
                               @endif
                               @if($uangPangkal->cicilan_2_jumlah ==  null)
                               <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Kirim </button>
                               </div>
                               @else
                                @if($uangPangkal != null)
                                  @if($uangPangkal->cicilan_2_status == "Ditolak")
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">Kirim </button>
                                   </div>
                                  @endif
                                @endif
                               @endif
                          </form>
                          @else
                          <div class="alert alert-warning bg-danger text-white" role="alert">
                            Silahkan Upload Bukti Pembayaran Di Cicilan Pertama
                          </div>
                          @endif
                        @else
                        <div class="alert alert-warning bg-danger text-white" role="alert">
                            Silahkan Upload Bukti Pembayaran Di Cicilan Pertama
                        </div>
                        @endif
                      </div>
                      <div class="tab-pane p-3" id="step-4" role="tabpanel">
	                   	  @if($uangPangkal != null)
                          @if($uangPangkal->cicilan_2_jumlah != null)
                          <form action="{{url('/pendaftar/pembayaran-uang-pangkal')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                             <div class="form-group">
                                <input type="hidden" name="cicilan" value="3">
                                <label class="text-muted">Jumlah Yang Akan Dibayar</label>
                                <input type="text" id="inputku" name="jumlah_cicilan" value="{{ $uangPangkal != null ? $uangPangkal->cicilan_3_jumlah : "" }}" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" required minlength="{{$jenisFormulir->minimal_uang_pangkal}}" />
                             </div>
                             <div class="form-group">
                                <label class="text-muted">Upload Struk Bukti Pembayaran</label>
                                <input type="file" class="form-control" name="bukti_pembayaran" required />
                             </div>
                             @if($uangPangkal->cicilan_3_jumlah != null)
                             <a class="image-popup-vertical-fit" href="{{ asset($uangPangkal->cicilan_3_bukti)}}">
                                <img class="img-fluid" alt="" src="{{ asset($uangPangkal->cicilan_3_bukti)}}" width="145">
                             </a>
                             <div class="form-group">
                                <label class="text-muted">Status Pembayaran</label>
                                <input type="text" class="form-control" value="{{ $uangPangkal->cicilan_3_status }}" disabled />
                             </div>
                             <div class="form-group">
                                <label class="text-muted">Tanggal Pembayaran</label>
                                <input type="text" class="form-control" value="{{ $uangPangkal->cicilan_3_tanggal->format('d-m-Y H:i:s') }}" disabled />
                             </div>
                             {{-- cicilan 3 --}}
                              @if($uangPangkal->cicilan_3_status == "Diterima")
                                <div class="form-group">
                                  <a href="{{ url('pendaftar/pembayaran-uang-pangkal/kwitansi','3') }}" target="_blank" class="btn btn-success">Download Kwitansi</a>
                                </div>
                              @endif
                             @endif
                             @if($uangPangkal->cicilan_3_jumlah == null)
                             <div class="form-group">
                                <button type="submit" class="btn btn-primary">Kirim </button>
                             </div>
                             @else
                              @if($uangPangkal != null)
                                @if($uangPangkal->cicilan_3_status == "Ditolak")
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Kirim </button>
                                 </div>
                                @endif
                              @endif
                             @endif
                          </form>
                          @else
                          <div class="alert alert-warning bg-danger text-white" role="alert">
                            Silahkan Upload Bukti Pembayaran Di Cicilan Kedua
                          </div>
                          @endif
                        @else
                        <div class="alert alert-warning bg-danger text-white" role="alert">
                            Silahkan Upload Bukti Pembayaran Di Cicilan Kedua
                        </div>
                        @endif
                      </div>
                      
                  </div>

              </div>
          </div>
        @endif
    </div> 
</div> 
@endsection

@section('assets-footer')
<script src="{{ asset('backend/plugins/select2/js/select2.min.js')}}"></script>
<script type="text/javascript">
    $(".select2").select2();

    $(".select2-limiting").select2({
        maximumSelectionLength: 2
    });
</script>

@if($formulirPembayaran != null)
  @if($formulirPembayaran->status == "Diterima")
    <script src="{{ asset('js/alert.js')}}"></script>
    <script type="text/javascript">
      $('#formDaftar').submit(function() {
        Swal.fire({
            title: 'Kirim Data?',
            text: 'Anda Yakin Bahwa Anda Sudah Mengisi Data Data diatas dengan Benar dan tidak terpaksa dan atas keinginan sendiri, Jika Iya klik Ya',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                url         : '{{ url('pendaftar/formulir') }}',
                type        : 'POST',
                dataType    : 'json',
                data        : new FormData(this),
                processData : false,
                contentType : false,
                beforeSend : function() {
                    $('button').attr('disabled', true);
                },
                success : function(res) {
                    if(res.ErrorCode != 0)
                    {
                        toastAlert('error', res.Message);
                        $('button').prop('disabled', false);
                    }
                    else
                    {
                        toastAlert('success', res.Message);
                        $('button').prop('disabled', false);
                        // setTimeout(function() {
                        //   window.location.replace('{{ url('pendaftar/formulir') }}');
                        // }, 1500)
                    }
                },
                error : function(res) {
                    toastAlert('error', 'Server Sedang Error');
                    $('button').prop('disabled', false);
                   
                }
            })
          }
        });
    })
    </script>
  @endif
@endif

@endsection
