@extends('frontend.layouts.master')
@section('title', $post->title)

@section('meta')
<meta name="keywords" content="{{ $post->slug }}">
<meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 155) }}">
<meta property="og:url" content="{{ url($_SERVER['REQUEST_URI']) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 155) }}" />
<meta property="og:image" content="{{ asset($post->featured) }}" />
@endsection

@section('konten')
@include('frontend.partials.article', ['prefix' => 'berita', 'listLabel' => 'Berita', 'listUrl' => url('/berita')])
@endsection
