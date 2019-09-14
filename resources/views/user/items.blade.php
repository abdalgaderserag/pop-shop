@extends('layouts.app')

@section('title',\Illuminate\Support\Facades\Auth::user()->name . ' | items')

@section('styles')
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/shared/shared.css">
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/header.css">
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/items.css">
@endsection

@section('content')
    <create-item></create-item>
@endsection