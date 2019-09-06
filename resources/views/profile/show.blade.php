@extends('layouts.app')
<?php
$Auth = $user->id == \Illuminate\Support\Facades\Auth::id();
?>

@section('title',$user->name . ' | Profile')

@section('content')
    {{ $Auth }}
    {{ $user }}
@endsection