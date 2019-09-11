@extends('layouts.app')

@section('title',\Illuminate\Support\Facades\Auth::user()->name . ' | items')

@section('styles')
    <link rel="stylesheet" href="/css/shared/shared.css">
    <link rel="stylesheet" href="/css/parts/header.css">
@endsection

@section('content')
    <create-item></create-item>
@endsection