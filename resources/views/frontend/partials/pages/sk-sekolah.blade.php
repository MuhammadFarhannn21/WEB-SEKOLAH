<article class="m-article m-document">
	<div class="m-document-head">
		<i class="fa fa-file-text-o"></i>
		<div><strong>Surat Keputusan Sekolah</strong><small>{{ $site->nama }}</small></div>
	</div>
	<div class="m-prose">{!! $post->body !!}</div>
	<dl class="m-dl">
		<div><dt>Nama Sekolah</dt><dd>{{ $site->nama }}</dd></div>
		@if($site->telepon)<div><dt>Telepon</dt><dd>{{ $site->telepon }}</dd></div>@endif
		@if($site->email)<div><dt>Email</dt><dd>{{ $site->email }}</dd></div>@endif
		@if($site->alamat)<div><dt>Alamat</dt><dd>{{ $site->alamat }}</dd></div>@endif
	</dl>
</article>
