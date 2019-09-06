@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/items.css">
@endsection

@section('content')
    <div class="nav-item search-bar">
        <button>S</button>
        <input type="search" placeholder="Search Item">
    </div>
    <app></app>

@endsection