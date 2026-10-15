<article class="m-article">
	@if($post->featured)
	<figure class="m-article-cover"><a href="{{ asset($post->featured) }}" data-fancybox="halaman"><img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" onerror="this.closest('figure').remove()"></a></figure>
	@endif
	<h3 class="m-block-title"><i class="fa fa-info-circle"></i> Tentang Sekolah</h3>
	<div class="m-prose">{!! $post->body !!}</div>
</article>
@include('frontend.partials.pages._highlights')
