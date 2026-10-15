@extends('frontend.layouts.master')
@section('title', 'Buku Tamu')

@php $acara = \App\Acara::orderBy('id', 'DESC')->get(); @endphp

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => 'Buku Tamu',
	'eyebrow' => 'Selamat Datang', 'icon' => 'fa-book',
	'subtitle' => 'Terima kasih telah berkunjung. Silakan isi buku tamu '.$site->nama.'.',
	'crumbs' => ['Buku Tamu' => null],
])

<section class="m-section m-section-soft m-page-body">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9 col-12">
				<div class="m-form-card reveal">
					<div class="m-form-side">
						<img src="{{ asset($site->logo_sub_be) }}" alt="" onerror="this.style.display='none'">
						<h3>Buku Tamu Digital</h3>
						<p>Data kunjungan Anda membantu kami meningkatkan pelayanan sekolah.</p>
						<ul>
							@if($site->alamat)<li><i class="fa fa-map-marker"></i>{{ $site->alamat }}</li>@endif
							@if($site->telepon)<li><i class="fa fa-phone"></i>{{ $site->telepon }}</li>@endif
							@if($site->waktu_buka)<li><i class="fa fa-clock-o"></i>{{ $site->waktu_buka }}</li>@endif
						</ul>
					</div>

					<form method="POST" action="{{ url('tamu') }}" enctype="multipart/form-data" class="m-form">
						@csrf
						@if($errors->any())
						<div class="m-alert"><i class="fa fa-exclamation-circle"></i> {{ $errors->first() }}</div>
						@endif
						<div class="m-field m-field-full">
							<label for="acara_id">Acara / Keperluan</label>
							<select name="acara_id" id="acara_id" required>
								@forelse($acara as $row)
								<option value="{{ $row->id }}" @selected(old('acara_id') == $row->id)>{{ $row->nama }}</option>
								@empty
								<option value="">Belum ada acara</option>
								@endforelse
							</select>
						</div>
						<div class="m-field">
							<label for="nama_pengunjung">Nama Pengunjung</label>
							<input type="text" id="nama_pengunjung" name="nama_pengunjung" value="{{ old('nama_pengunjung') }}" required placeholder="Nama lengkap" autocomplete="name">
						</div>
						<div class="m-field">
							<label for="instansi">Instansi</label>
							<input type="text" id="instansi" name="instansi" value="{{ old('instansi') }}" required placeholder="Instansi / perusahaan / umum" autocomplete="organization">
						</div>
						<div class="m-field">
							<label for="telepon">Telepon</label>
							<input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}" required placeholder="08xxxxxxxxxx" inputmode="numeric" pattern="[0-9+ ]{8,16}" autocomplete="tel">
						</div>
						<div class="m-field">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" autocomplete="email">
						</div>
						<div class="m-field m-field-full">
							<label for="alamat">Alamat</label>
							<textarea id="alamat" name="alamat" rows="3" required placeholder="Alamat lengkap" autocomplete="street-address">{{ old('alamat') }}</textarea>
						</div>
						<div class="m-field m-field-full">
							<label for="keterangan">Keterangan <small>(opsional)</small></label>
							<input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Keperluan kunjungan">
						</div>
						<div class="m-field m-field-full">
							<label>Foto</label>
							<label class="m-photo-pick" for="photo">
								<img alt="" hidden>
								<span class="ph"><i class="fa fa-camera"></i><b>Ambil atau pilih foto</b><small>JPG / PNG, maksimal 2 MB</small></span>
								<input type="file" id="photo" name="photo" accept="image/*" capture="user" required>
							</label>
						</div>
						<div class="m-field m-field-full">
							<button type="submit" class="m-btn m-btn-primary m-btn-block"><i class="fa fa-paper-plane"></i> Kirim Buku Tamu</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
