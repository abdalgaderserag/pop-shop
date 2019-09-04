@extends('layouts.app')
<?php
$Auth = $user->id == \Illuminate\Support\Facades\Auth::id();
?>
@section('content')
    {{ $Auth }}
    {{ $user }}
@endsection