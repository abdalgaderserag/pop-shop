@extends('layouts.app')

@section('styles')
    @auth
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/shared/shared.css">
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/header.css">
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/items.css">
    @else
        <link rel="stylesheet" href="/css/style/shared/shared.css">
        <link rel="stylesheet" href="/css/style/parts/header.css">
        <link rel="stylesheet" href="/css/style/items.css">
    @endauth
@endsection

@section('content')
    <div class="nav-item search-bar">
        <button>S</button>
        <input type="search" placeholder="Search Item">
    </div>
    <app></app>

@endsection