@extends('layouts.app')

@section('title',\Illuminate\Support\Facades\Auth::user()->name . ' | Payments')

@section('styles')
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/shared/shared.css">
    <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/header.css">
@endsection

@section('content')

@endsection