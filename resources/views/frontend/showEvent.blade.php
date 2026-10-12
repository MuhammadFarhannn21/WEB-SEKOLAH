@extends('frontend.layouts.master')

@section('meta')
<meta name="keywords" content="{{ $post->slug }}">
<meta name="description" content="{{ substr($post->body, 0, 100) }}">
<meta property="og:url" content="{{ url($_SERVER['REQUEST_URI']) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ substr($post->body, 0, 100) }}" />
<meta property="og:image" content="{{ asset($post->featured) }}" />
@endsection

@section('konten')

{{-- Breadcrumb --}}
<section style="background-image: url({{ asset(\App\Aplikasi::first()->gambar_total_siswa) }}); background-size:cover; background-position:center; padding:60px 0; position:relative;">
    <div style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(26,46,90,0.75);"></div>
    <div class="container" style="position:relative; z-index:1; text-align:center;">
        <h2 style="color:#fff; font-size:28px; font-weight:700; margin-bottom:10px;">{{ $post->title }}</h2>
        <ul style="list-style:none; padding:0; margin:0; display:flex; justify-content:center; align-items:center; gap:8px;">
            <li><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Home</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li><a href="{{ url('/event') }}" style="color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px;">Event</a></li>
            <li style="color:rgba(255,255,255,0.5);"><i class="fa fa-angle-right"></i></li>
            <li style="color:#fff; font-size:14px;">{{ substr($post->title, 0, 30) }}...</li>
        </ul>
    </div>
</section>

{{-- Konten Event --}}
<section style="padding:60px 0; background:#f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div style="background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
                    {{-- Gambar Featured --}}
                    @if($post->featured)
                    <div style="width:100%; height:380px; background-image:url('{{ asset($post->featured) }}'); background-size:cover; background-position:center; position:relative;">
                        <div style="position:absolute; top:15px; left:15px; background:#0F6E56; color:#fff; padding:5px 14px; border-radius:20px; font-size:12px; font-weight:600;">
                            {{ $post->category->title ?? 'Event' }}
                        </div>
                    </div>
                    @endif

                    <div style="padding:30px;">
                        {{-- Meta Info --}}
                        <div style="display:flex; flex-wrap:wrap; gap:16px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid #f0f0f0;">
                            <span style="color:#888; font-size:13px;">
                                <i class="fa fa-user" style="color:#0F6E56; margin-right:5px;"></i>
                                {{ $post->user->name ?? 'Admin' }}
                            </span>
                            <span style="color:#888; font-size:13px;">
                                <i class="fa fa-calendar" style="color:#0F6E56; margin-right:5px;"></i>
                                <?php $tanggal = date_create($post->published_at); ?>
                                {{ date_format($tanggal, "d M Y") }}
                            </span>
                            <span style="color:#888; font-size:13px;">
                                <i class="fa fa-archive" style="color:#0F6E56; margin-right:5px;"></i>
                                {{ $post->category->title ?? '-' }}
                            </span>
                        </div>

                        {{-- Judul --}}
                        <h1 style="font-size:24px; font-weight:700; color:#1a2e5a; margin-bottom:20px; line-height:1.4;">
                            {{ $post->title }}
                        </h1>

                        {{-- Body --}}
                        <div style="color:#555; font-size:15px; line-height:1.9;">
                            {!! $post->body !!}
                        </div>

                        {{-- Share --}}
                        <div style="margin-top:30px; padding-top:20px; border-top:1px solid #f0f0f0; display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                            <span style="color:#888; font-size:13px; font-weight:600;">Bagikan:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" style="background:#1877f2; color:#fff; padding:6px 14px; border-radius:20px; font-size:12px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-facebook" style="margin-right:4px;"></i>Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $post->title }}" target="_blank" style="background:#1da1f2; color:#fff; padding:6px 14px; border-radius:20px; font-size:12px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-twitter" style="margin-right:4px;"></i>Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" style="background:#25d366; color:#fff; padding:6px 14px; border-radius:20px; font-size:12px; font-weight:600; text-decoration:none;">
                                <i class="fa fa-whatsapp" style="margin-right:4px;"></i>WhatsApp
                            </a>
                        </div>

                        {{-- Navigasi Prev/Next --}}
                        <div style="margin-top:20px; display:flex; justify-content:space-between; gap:10px;">
                            @php
                                $prev = \App\Post::where('jenis','Acara')->where('status',1)->where('id','<',$post->id)->orderBy('id','DESC')->first();
                                $next = \App\Post::where('jenis','Acara')->where('status',1)->where('id','>',$post->id)->orderBy('id','ASC')->first();
                            @endphp
                            @if($prev)
                            <a href="{{ url('/event/'.$prev->slug) }}" style="flex:1; background:#f8f9fa; border:1px solid #e0e0e0; border-radius:8px; padding:12px 16px; text-decoration:none; display:flex; align-items:center; gap:8px;">
                                <i class="fa fa-angle-left" style="color:#0F6E56; font-size:18px;"></i>
                                <div>
                                    <div style="font-size:10px; color:#999; margin-bottom:2px;">Sebelumnya</div>
                                    <div style="font-size:12px; font-weight:600; color:#1a2e5a;">{{ substr($prev->title, 0, 35) }}...</div>
                                </div>
                            </a>
                            @endif
                            @if($next)
                            <a href="{{ url('/event/'.$next->slug) }}" style="flex:1; background:#f8f9fa; border:1px solid #e0e0e0; border-radius:8px; padding:12px 16px; text-decoration:none; display:flex; align-items:center; justify-content:flex-end; gap:8px; text-align:right;">
                                <div>
                                    <div style="font-size:10px; color:#999; margin-bottom:2px;">Selanjutnya</div>
                                    <div style="font-size:12px; font-weight:600; color:#1a2e5a;">{{ substr($next->title, 0, 35) }}...</div>
                                </div>
                                <i class="fa fa-angle-right" style="color:#0F6E56; font-size:18px;"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Komentar --}}
                <div style="background:#fff; border-radius:12px; padding:30px; margin-top:24px; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
                    <h3 style="font-size:18px; font-weight:700; color:#1a2e5a; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #0F6E56; display:inline-block;">
                        <i class="fa fa-comments" style="margin-right:8px; color:#0F6E56;"></i>Komentar
                    </h3>
                    <div id="disqus_thread"></div>
                    <script>
                    (function() {
                        var d = document, s = d.createElement('script');
                        s.src = 'https://smk-kosgoro.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                    </script>
                </div>
            </div>

            {{-- Sidebar --}}
            @include('frontend.partials._berita')
        </div>
    </div>
</section>

@endsection