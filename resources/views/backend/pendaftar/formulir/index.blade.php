@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Formulir Calon Siswa</h4>     
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        @if($formulirPembayaran != null)
          @if($formulirPembayaran->status == "Menunggu Konfirmasi Admin")
          <div class="alert alert-warning bg-danger text-white" role="alert" style="margin-top: -10px">
              Halaman Ini Tidak Akan Bisa Di Isi Sebelum Admin Mengkonfirmasi Bukti Pembayaran Formulir Anda
          </div>
          @endif

          @if($formulirPembayaran->status == "Diterima")
          <form method="POST" action="#" id="formDaftar" onsubmit="return false">
          @csrf
          <div class="alert alert-warning bg-success text-white" role="alert" style="margin-top: -10px">
                Silahkan Masukan Data Anda Dengan Benar
            </div>
          <div class="card m-b-20">
              
              <div class="card-body">

                  <!-- Nav tabs -->
                  <ul class="nav nav-pills nav-justified" role="tablist">
                      <li class="nav-item waves-effect waves-light">
                          <a class="nav-link  active show" data-toggle="tab" href="#step-1" role="tab" aria-selected="false">Langkah 1</a>
                      </li>
                      <li class="nav-item waves-effect waves-light">
                          <a class="nav-link" data-toggle="tab" href="#step-2" role="tab" aria-selected="true">Langkah 2</a>
                      </li>
                      <li class="nav-item waves-effect waves-light">
                          <a class="nav-link" data-toggle="tab" href="#step-4" role="tab" aria-selected="false">Langkah 3</a>
                      </li>
                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div class="tab-pane p-3 active show" id="step-1" role="tabpanel">
                          <div class="row">
                            <div class="col-md-6">
                              <label><b>A. Identitas Calon Siswa</b></label>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Nama Panggilan</label>
                                    <input type="text" class="form-control" name="nama_panggilan" value="{{ $formulir != null ? $formulir->nama_panggilan : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" class="form-control" name="nisn" value="{{ $formulir != null ? $formulir->nisn : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->agama }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->alamat_rumah }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                              <label><b>B. Asal Sekolah</b></label>
                                <div class="form-group">
                                    <label>Nama Sekolah</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->asal_sekolah }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Sekolah</label>
                                    <input type="text" class="form-control" name="alamat_sekolah" value="{{ $formulir != null ? $formulir->alamat_sekolah : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>Asal Daerah Sekolah</label>
                                    <select class="form-control"  name="asal_daerah_sekolah">
                                      <option value="Kota Bogor" {{ $formulir != null ? ($formulir->asal_daerah_sekolah == "Kota Bogor" ? "selected" : "") : "" }}>Kota Bogor</option>
                                      <option value="Kabupaten Bogor" {{ $formulir != null ? ($formulir->asal_daerah_sekolah == "Kabupaten Bogor" ? "selected" : "") : "" }}>Kabupaten Bogor</option>
                                      <option value="Lainnya" {{ $formulir != null ? ($formulir->asal_daerah_sekolah == "Lainnya" ? "selected" : "") : "" }}>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Prioritas Pilihan 1</label>
                                    <select class="form-control"  name="pilihan_pertama">
                                      @foreach(\App\Jurusan::all() as $jurusan)
                                        <option value="{{ $jurusan->judul }}"  {{ $formulir != null ? ($formulir->pilihan_pertama == $jurusan->judul ? "selected" : "") : "" }}>{{ $jurusan->judul }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Prioritas Pilihan 2</label>
                                    <select class="form-control"  name="pilihan_kedua">
                                      @foreach(\App\Jurusan::all() as $jurusan)
                                        <option value="{{ $jurusan->judul }}" {{ $formulir != null ? ($formulir->pilihan_kedua == $jurusan->judul ? "selected" : "") : "" }}>{{ $jurusan->judul }}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Prioritas Pilihan 3</label>
                                    <select class="form-control"  name="pilihan_ketiga">
                                      @foreach(\App\Jurusan::all() as $jurusan)
                                        <option value="{{ $jurusan->judul }}" {{ $formulir != null ? ($formulir->pilihan_ketiga == $jurusan->judul ? "selected" : "") : "" }}>{{ $jurusan->judul }}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="tab-pane p-3" id="step-2" role="tabpanel">
                          <div class="row">
                            <div class="col-md-6">
                              <label><b>Kelengkapan Data Siswa</b></label>
                              <div class="form-group">
                                  <label>Kewarganegaraan</label>
                                  <input type="text" class="form-control" name="kewarganegaraan" value="{{ $formulir != null ? $formulir->kewarganegaraan : "" }}">
                              </div>
                              <div class="form-group">
                                  <label>Anak ke- </label>
                                  <input type="number" class="form-control" name="anak_ke"  value="{{ $formulir != null ? $formulir->anak_ke : "" }}">
                              </div>
                              <div class="form-group">
                                  <label>Dari Berapa Bersaudara</label>
                                  <input type="number" class="form-control" name="dari_berapa_bersaudara" value="{{ $formulir != null ? $formulir->dari_berapa_bersaudara : "" }}">
                              </div>
                              <div class="form-group">
                                  <label>Jumlah Saudara Tiri</label>
                                  <input type="number" class="form-control" name="jumlah_saudara_tiri" value="{{ $formulir != null ? $formulir->jumlah_saudara_tiri : "" }}" placeholder="boleh kosong">
                              </div>
                              <div class="form-group">
                                  <label>Jumlah Saudara Angkat</label>
                                  <input type="number" class="form-control" name="jumlah_saudara_angkat" value="{{ $formulir != null ? $formulir->jumlah_saudara_angkat : "" }}"  placeholder="boleh kosong">
                              </div>
                              <div class="form-group">
                                  <label>Anak Yatim/piatu/angkat</label>
                                  <select class="form-control" name="anak_yatim_piatu_angkat">
                                    <option value="" {{ $formulir != null ? ($formulir->anak_yatim_piatu_angkat == "" ? "selected" : "") : "" }}>Boleh Kosong</option>
                                    <option value="Yatim" {{ $formulir != null ? ($formulir->anak_yatim_piatu_angkat == "Yatim" ? "selected" : "") : "" }}>Yatim</option>
                                    <option value="Piatu" {{ $formulir != null ? ($formulir->anak_yatim_piatu_angkat == "Piatu" ? "selected" : "") : "" }}>Piatu</option>
                                    <option value="Angkat" {{ $formulir != null ? ($formulir->anak_yatim_piatu_angkat == "Angkat" ? "selected" : "") : "" }}>Angkat</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Bahasa Sehari hari</label>
                                  <input type="text" class="form-control" name="bahasa" value="{{ $formulir != null ? $formulir->bahasa : "" }}">
                              </div>
                              <div class="form-group">
                                  <label>Nama Orangtua/Wali</label>
                                  <input type="text" class="form-control" name="nama_orangtua_atau_wali" value="{{ $formulir != null ? $formulir->nama_orangtua_atau_wali : "" }}">
                              </div>
                              <div class="form-group">
                                  <label>No. HP Orangtua/Wali</label>
                                  <input type="number" class="form-control" name="no_hp_orangtua_atau_wali" value="{{ $formulir != null ? $formulir->no_hp_orangtua_atau_wali : "" }}">
                              </div>
                              <div class="form-group">
                                  <label>Tinggal</label>
                                  <select class="form-control"  name="tinggal">
                                    <option value="Orangtua" {{ $formulir != null ? ($formulir->tinggal == "Orangtua" ? "selected" : "") : "" }}>Orangtua</option>
                                    <option value="Menumpang" {{ $formulir != null ? ($formulir->tinggal == "Menumpang" ? "selected" : "") : "" }}>Menumpang</option>
                                    <option value="Sendiri" {{ $formulir != null ? ($formulir->tinggal == "Sendiri" ? "selected" : "") : "" }}>Sendiri</option>
                                  </select>
                              </div>

                            </div>
                            <div class="col-md-6">
                               <label><b></b></label>
                                <div class="form-group">
                                  <label>Jarak tempat tinggal (KM)</label>
                                  <input type="text" class="form-control" name="jarak_tempat_tinggal"  value="{{ $formulir != null ? $formulir->jarak_tempat_tinggal : "" }}">
                                </div>

                                <div class="form-group">
                                    <label>Kesekolah Dengan</label>
                                    <select class="form-control"  name="kesekolah_dengan" value="{{ $formulir != null ? $formulir->kesekolah_dengan : "" }}">
                                      <option value="Umum">Umum</option>
                                      <option value="Pribadi">Pribadi</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                  <label>Keterangan Kesehatan</label>
                                  <input type="text" class="form-control" name="keterangan_kesehatan"  value="{{ $formulir != null ? $formulir->keterangan_kesehatan : "" }}">
                                </div>
                                <div class="form-group">
                                  <label>Berat Badan</label>
                                  <input type="text" class="form-control" name="berat_badan"  value="{{ $formulir != null ? $formulir->berat_badan : "" }}" placeholder="Boleh Kosong Jika Tidak Tau">
                                </div>
                                <div class="form-group">
                                  <label>Tinggi Badan</label>
                                  <input type="text" class="form-control" name="tinggi_badan"  value="{{ $formulir != null ? $formulir->tinggi_badan : "" }}" placeholder="Boleh Kosong Jika Tidak Tau">
                                </div>
                                <div class="form-group">
                                  <label>Golongan Badan</label>
                                  <input type="text" class="form-control" name="golongan_darah"  value="{{ $formulir != null ? $formulir->golongan_darah : "" }}" placeholder="Boleh Kosong Jika Tidak Tau">
                                </div>
                                <div class="form-group">
                                  <label>Penyakit Yang pernah di derita</label>
                                  <input type="text" class="form-control" name="penyakit_yg_pernah_diderita"  value="{{ $formulir != null ? $formulir->penyakit_yg_pernah_diderita : "" }}" >
                                </div>
                                 <div class="form-group">
                                  <label>Bakat Khusus</label>
                                  <select class="form-control" name="bakat_khusus">
                                    <option value=""  {{ $formulir != null ? ($formulir->bakat_khusus == "" ? "selected" : "") : "" }}></option>
                                    <option value="Kesenian"  {{ $formulir != null ? ($formulir->bakat_khusus == "Kesenian" ? "selected" : "") : "" }}>Kesenian</option>
                                    <option value="Olahraga"  {{ $formulir != null ? ($formulir->bakat_khusus == "Olahraga" ? "selected" : "") : "" }}>Olahraga</option>
                                    <option value="Organisasi"  {{ $formulir != null ? ($formulir->bakat_khusus == "Organisasi" ? "selected" : "") : "" }}>Organisasi</option>
                                    <option value="Hasta Karya"  {{ $formulir != null ? ($formulir->bakat_khusus == "Hasta Karya" ? "selected" : "") : "" }}>Hasta Karya</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Prestasi Khusus</label>
                                  <input type="text" class="form-control" name="prestasi_khusus" placeholder="Boleh Kosong Jika Tidak Tau" value="{{ $formulir != null ? $formulir->prestasi_khusus : "" }}">
                                </div>
                                <div class="form-group">
                                  <label>Ekskul Yang DiMinati</label>

                                  @if($formulir == null)
                                  <select class="select2 form-control select2-multiple" name="ekskul_yg_diminati_2[]" multiple="multiple" multiple data-placeholder="Minimal Pilih 1" >
                                     <option value="Pramuka">Pramuka</option>
                                     <option value="Paskibra">Paskibra</option>
                                     <option value="Paduan Suara">Paduan Suara</option>
                                     <option value="PMR">PMR</option>
                                     <option value="Volley">Volley</option>
                                     <option value="Sinema">Sinema</option>
                                     <option value="English Club">English Club</option>
                                     <option value="Rohis">Rohis</option>
                                  </select>
                                  @else
                                   <select class="select2 form-control select2-multiple" name="ekskul_yg_diminati_2[]" multiple="multiple" multiple data-placeholder="Minimal Pilih 1" >
                                     <option value="Pramuka" {{  (in_array("Pramuka", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>Pramuka</option>
                                     <option value="Paskibra" {{  (in_array("Paskibra", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>Paskibra</option>
                                     <option value="Paduan Suara" {{  (in_array("Paduan Suara", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>Paduan Suara</option>
                                     <option value="PMR" {{  (in_array("PMR", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>PMR</option>
                                     <option value="Volley" {{  (in_array("Volley", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>Volley</option>
                                     <option value="Sinema" {{  (in_array("Sinema", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>Sinema</option>
                                     <option value="English Club" {{  (in_array("English Club", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>English Club</option>
                                     <option value="Rohis" {{  (in_array("Rohis", explode(',',$formulir->ekskul_yg_diminati)) === false) ? '' : 'selected' }}>Rohis</option>
                                  </select>
                                  @endif
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="tab-pane p-3" id="step-4" role="tabpanel">
                        <div class="row">
                          <div class="col-md-12">
                            <label><b>Angket Informasi</b></label>
                            <div class="form-group">
                                <label>Anda Memperoleh Informasi Penerimaan Siswa Baru (PSB) Dari</label>
                                <select class="form-control"  name="informasi_penerimaan">
                                  <option value="Edaran brosur"  {{ $formulir != null ? ($formulir->informasi_penerimaan == "Edaran brosur" ? "selected" : "") : "" }}>Edaran brosur</option>
                                  <option value="Membaca iklan / informasi di koran"  {{ $formulir != null ? ($formulir->informasi_penerimaan == "Membaca iklan / informasi di koran" ? "selected" : "") : "" }}>Membaca iklan / informasi di koran</option>
                                  <option value="Membaca spanduk"  {{ $formulir != null ? ($formulir->informasi_penerimaan == "Membaca spanduk" ? "selected" : "") : "" }}>Membaca spanduk</option>
                                  <option value="Ada saudara yang sekolah di SMP/SMA/SMK Kosgoro"  {{ $formulir != null ? ($formulir->informasi_penerimaan == "Ada saudara yang sekolah di SMP/SMA/SMK Kosgoro" ? "selected" : "") : "" }}>Ada saudara yang sekolah di SMP/SMA/SMK Kosgoro</option>
                                  <option value="Dari Internet"  {{ $formulir != null ? ($formulir->informasi_penerimaan == "Dari Internet" ? "selected" : "") : "" }}>Dari Internet</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Anda Berasal Dari SMP / MTS</label>
                                <select class="form-control"  name="berasal_dari_smp">
                                  <option value="Negeri" {{ $formulir != null ? ($formulir->berasal_dari_smp == "Negeri" ? "selected" : "") : "" }}>Negeri</option>
                                  <option value="Swasta" {{ $formulir != null ? ($formulir->berasal_dari_smp == "Swasta" ? "selected" : "") : "" }}>Swasta</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Anda berasal dari SMP / MTs yang terletak di :</label>
                                <select class="form-control"  name="berasal_dari_smp_terletak">
                                  <option value="Kota Bogor"  {{ $formulir != null ? ($formulir->berasal_dari_smp_terletak == "Kota Bogor" ? "selected" : "") : "" }}>Kota Bogor</option>
                                  <option value="Kabupaten Bogor"  {{ $formulir != null ? ($formulir->berasal_dari_smp_terletak == "Kabupaten Bogor" ? "selected" : "") : "" }}>Kabupaten Bogor</option>
                                  <option value="Lainnya"  {{ $formulir != null ? ($formulir->berasal_dari_smp_terletak == "Lainnya" ? "selected" : "") : "" }}>Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Dalam Memilih Sekolah, Anda</label>
                                <select class="form-control"  name="dalam_memilih_sekolah">
                                  <option value="Mendaftar sekolah negeri terlebih dahulu" {{ $formulir != null ? ($formulir->dalam_memilih_sekolah == "Mendaftar sekolah negeri terlebih dahulu" ? "selected" : "") : "" }}>Mendaftar sekolah negeri terlebih dahulu</option>
                                  <option value="Langsung mendaftar di SMK Kosgoro" {{ $formulir != null ? ($formulir->dalam_memilih_sekolah == "Langsung mendaftar di SMK Kosgoro" ? "selected" : "") : "" }}>Langsung mendaftar di SMK Kosgoro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Alasan Anda Mendaftar Di SMK Kosgoro Adalah</label>
                                <select class="form-control"  name="alasan_anda_mendaftar">
                                  <option value="Tidak diterima di SMA / SMK Negeri"  {{ $formulir != null ? ($formulir->alasan_anda_mendaftar == "Tidak diterima di SMA / SMK Negeri" ? "selected" : "") : "" }}>Tidak diterima di SMA / SMK Negeri</option>
                                  <option value="Ikut teman sekolah"  {{ $formulir != null ? ($formulir->alasan_anda_mendaftar == "Ikut teman sekolah" ? "selected" : "") : "" }}>Ikut teman sekolah</option>
                                  <option value="Anjuran dari Orang Tua"  {{ $formulir != null ? ($formulir->alasan_anda_mendaftar == "Anjuran dari Orang Tua" ? "selected" : "") : "" }}>Anjuran dari Orang Tua</option>
                                  <option value="Anjuran dari Guru SMP/MTs"  {{ $formulir != null ? ($formulir->alasan_anda_mendaftar == "Anjuran dari Guru SMP/MTs" ? "selected" : "") : "" }}>Anjuran dari Guru SMP/MTs</option>
                                  <option value="Ada saudara di SMP/SMA/SMK Kosgoro"  {{ $formulir != null ? ($formulir->alasan_anda_mendaftar == "Ada saudara di SMP/SMA/SMK Kosgoro" ? "selected" : "") : "" }}>Ada saudara di SMP/SMA/SMK Kosgoro</option>
                                  <option value="Rumah dekat dari SMK Kosgoro"  {{ $formulir != null ? ($formulir->alasan_anda_mendaftar == "Rumah dekat dari SMK Kosgoro" ? "selected" : "") : "" }}>Rumah dekat dari SMK Kosgoro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                           </div>
                        </div>
                      </div>
                      
                  </div>

              </div>
          </div>
          </form>
          @endif
        @else
        <div class="alert alert-warning bg-danger text-white" role="alert" style="margin-top: -10px">
            Halaman Ini Tidak Akan Bisa Di Isi Sebelum Anda Mengupload Bukti Pembayaran Formulir Anda
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
