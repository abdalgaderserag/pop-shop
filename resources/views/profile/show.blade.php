@extends('layouts.app')
<?php
$Auth = $user->id == \Illuminate\Support\Facades\Auth::id();
?>

@section('title',$user->name . ' | Profile')

@section('styles')
    {{--<link rel="stylesheet" href="/css/items.css">--}}
    <link rel="stylesheet" href="/css/profile/item-view.css">
@endsection

@section('content')
    <div class="flex-box" style="justify-content: center">
        <div class="main-section" style="width: unset">
            <div style="text-align: center;">
                <img style="width: 167px;border-radius: 50%" src="/{{ $user->bio->avatar }}" alt="">
                <div>
                    <span>{{ $user->name }}</span>
                    @if($user->bio->payment_verified)
                        <span>*</span>
                    @endif
                </div>
                <div>{{ $user->bio->location }}</div>
            </div>
            <br>
            <div style="padding: 0 20%">{{ $user->bio->about }}</div>

            <br>
            <div>Items :</div>
            <div class="flex-box item-scroll">
                <div class="arrow">
                </div>
                @foreach([1,2,3] as $a)
                    <div class="item-view">
                        <img src="/test/mapbox.jpg">
                        <div>
                            <div>{{ $user->name }}</div>
                            <div>{{ "$" . $a . "000" }}</div>
                        </div>
                        <button class="input-button">
                            Buy
                        </button>
                    </div>
                @endforeach

                <div class="arrow">
                </div>
            </div>
        </div>
    </div>
@endsection