@extends('layouts.app')
<?php
$Auth = $user->id == \Illuminate\Support\Facades\Auth::id();
?>

@section('title',$user->name . ' | Profile')

@section('styles')
    @auth
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/shared/shared.css">
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/header.css">
        <link rel="stylesheet"
              href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/profile/item-view.css">
    @else
        <link rel="stylesheet" href="/css/style/shared/shared.css">
        <link rel="stylesheet" href="/css/style/parts/header.css">
        <link rel="stylesheet" href="/css/style/profile/item-view.css">
    @endauth
@endsection

@section('content')
    <div class="flex-box" style="justify-content: center">
        <div class="main-section" style="width: unset">
            <div class="flex-box"
                 style="flex-direction: column;justify-content: center;text-align: center;align-items: center;">
                <div>
                    <img style="width: 167px;border-radius: 50%" src="/{{ $user->bio->avatar }}" alt="">
                </div>
                <div class="flex-box mark-title" style="width: 30%;">
                    <div></div>
                    <div style="font-size: 2.5vh">
                        <span>{{ $user->name }}</span>
                        @if($user->bio->payment_verified)
                            <span>*</span>
                        @endif
                    </div>
                </div>
                <div style="padding: 12px 0 0 0;">{{ $user->bio->location }}</div>
            </div>

            <br>
            <div style="padding: 0 20%">{{ $user->bio->about }}</div>

            <br>

            <div class="flex-box" style="flex-wrap: wrap">
                @foreach($user->items as $item)
                    <div class="item-card">
                        <div class="item-left">
                            <img src="/{{ $item->images[0] }}" class="item-image main-image">
                        </div>

                        <div class="item-body">
                            <div class="flex-box item-text">
                                <div style="width: 100%;">
                                    <div class="flex-box item-title">
                                        <div>{{ $item->title . ' - $' . $item->budget }}</div>
                                        <button class="input-button">
                                            Buy
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="item-text">
                                <div style="font-size: 2.4vh">{{ $item->details }}</div>
                            </div>
                            <div class="item-text">
                                <span>Location :</span>
                                <span>{{ $item->category->location }}</span>
                            </div>
                            <div class="item-text">
                                <span>Category :</span>
                                <span> {{ $item->category->base_type }} / {{ $item->category->seconder_type }} </span>
                            </div>

                            @if($item->stock != 'unlimited')
                                <div class="item-text">
                                    only <span>{{ $item->stock }}</span> in stock
                                </div>
                            @endif


                            <br>
                            @if($item->stock == 'unlimited')
                                <div class="item-tag">
                                    Unlimited
                                </div>
                            @endif
                            @if($item->category->exchangeable)
                                <div class="item-tag">
                                    Exchangelable
                                </div>
                            @endif
                            @if($item->category->used)
                                <div class="item-tag">
                                    Used
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

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