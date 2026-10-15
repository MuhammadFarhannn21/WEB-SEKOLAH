{{--
	Daftar kartu fasilitas / ekstrakurikuler.
	Parameter: $items, $prefix (fasilitas|ekstrakurikuler), $label, $icon, $chipClass (opsional)
--}}
@if($items->count())
	@if($items->count() > 6)
	<div class="m-filter reveal">
		<i class="fa fa-search"></i>
		<input type="search" placeholder="Cari {{ strtolower($label) }}..." data-filter="#grid-{{ $prefix }}" aria-label="Cari {{ $label }}">
	</div>
	@endif
	<div class="m-grid m-grid-3" id="grid-{{ $prefix }}">
		@foreach($items as $i => $item)
		<a href="{{ url($prefix.'/'.$item->id) }}" class="m-card reveal reveal-d{{ $i % 3 + 1 }}" data-filter-text="{{ strtolower($item->nama.' '.$item->deskripsi.' '.($item->pembina ?? '')) }}">
			<div class="m-card-media">
				@if($item->foto)
					<span class="img" style="background-image:url('{{ asset($item->foto) }}')"></span>
				@else
					<span class="m-ph"><i class="fa {{ $icon }}"></i></span>
				@endif
				<span class="m-chip {{ $chipClass ?? '' }}">{{ $label }}</span>
			</div>
			<div class="m-card-body">
				<h4>{{ $item->nama }}</h4>
				@if($item->deskripsi)<p>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 110) }}</p>@endif
				@if(!empty($item->pembina))
				<span class="m-meta" style="margin:0 0 12px;"><span><i class="fa fa-user-o"></i>Pembina: {{ $item->pembina }}</span></span>
				@endif
				<span class="m-link">Lihat detail <i class="fa fa-arrow-right"></i></span>
			</div>
		</a>
		@endforeach
	</div>
	<p class="m-filter-empty" hidden>Tidak ada {{ strtolower($label) }} yang cocok.</p>
@else
	@include('frontend.partials.empty', ['icon' => $icon, 'title' => 'Belum ada data '.strtolower($label), 'text' => 'Data akan tampil setelah ditambahkan oleh admin.'])
@endif
