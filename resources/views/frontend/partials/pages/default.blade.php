<article class="m-article">
	@if($post->featured)
	<figure class="m-article-cover"><a href="{{ asset($post->featured) }}" data-fancybox="halaman"><img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" onerror="this.closest('figure').remove()"></a></figure>
	@endif
	<div class="m-prose">{!! $post->body !!}</div>
</article>
