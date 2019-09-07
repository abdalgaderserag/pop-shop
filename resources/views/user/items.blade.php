@extends('layouts.app')

@section('title',\Illuminate\Support\Facades\Auth::user()->name . ' | items')

@section('content')
    <create-item></create-item>
@endsection