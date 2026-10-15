@extends('frontend.layouts.master')
@section('title', $ekskul->nama)

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => $ekskul->nama,
	'eyebrow' => 'Ekstrakurikuler', 'icon' => 'fa-star-o',
	'image' => $ekskul->foto ?: null,
	'crumbs' => ['Ekstrakurikuler' => url('/ekstrakurikuler'), $ekskul->nama => null],
])
@include('frontend.partials.item-detail', [
	'item' => $ekskul, 'prefix' => 'ekstrakurikuler', 'label' => 'Ekstrakurikuler', 'icon' => 'fa-futbol-o',
	'others' => \App\Ekstrakurikuler::where('status', 'aktif')->where('id', '!=', $ekskul->id)->limit(5)->get(),
])
@endsection
