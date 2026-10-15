@extends('frontend.layouts.master')
@section('title', $fasilitas->nama)

@section('konten')
@include('frontend.partials.page-hero', [
	'title' => $fasilitas->nama,
	'eyebrow' => 'Fasilitas Sekolah', 'icon' => 'fa-building-o',
	'image' => $fasilitas->foto ?: null,
	'crumbs' => ['Fasilitas' => url('/fasilitas'), $fasilitas->nama => null],
])
@include('frontend.partials.item-detail', [
	'item' => $fasilitas, 'prefix' => 'fasilitas', 'label' => 'Fasilitas', 'icon' => 'fa-building',
	'others' => \App\Fasilitas::where('status', 'aktif')->where('id', '!=', $fasilitas->id)->limit(5)->get(),
])
@endsection
