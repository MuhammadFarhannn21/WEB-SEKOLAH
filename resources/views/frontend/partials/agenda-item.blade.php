@php
	$mulai = \Carbon\Carbon::parse($agenda->start);
	$selesai = $agenda->end ? \Carbon\Carbon::parse($agenda->end) : null;
@endphp
<div class="m-agenda-item {{ !empty($past) ? 'is-past' : '' }}">
	<span class="date"><b>{{ $mulai->format('d') }}</b>{{ $mulai->translatedFormat('M') }}</span>
	<span>
		<strong>{{ $agenda->title }}</strong>
		<small><i class="fa fa-clock-o"></i>
			{{ $mulai->translatedFormat('d M Y') }}
			@if($selesai && !$selesai->isSameDay($mulai)) – {{ $selesai->translatedFormat('d M Y') }}@endif
		</small>
	</span>
</div>
