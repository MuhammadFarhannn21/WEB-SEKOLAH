{{-- Tampilan saat data kosong. Parameter: icon, title, text, action (url), actionLabel --}}
<div class="m-empty">
	<span class="m-empty-icon"><i class="fa {{ $icon ?? 'fa-inbox' }}"></i></span>
	<h4>{{ $title ?? 'Belum ada data' }}</h4>
	@if(!empty($text))<p>{{ $text }}</p>@endif
	@if(!empty($action))<a href="{{ $action }}" class="m-btn m-btn-primary m-btn-sm">{{ $actionLabel ?? 'Kembali' }} <i class="fa fa-arrow-right"></i></a>@endif
</div>
