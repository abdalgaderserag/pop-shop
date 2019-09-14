@extends('layouts.app')

@section('styles')
    @auth
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/shared/shared.css">
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/parts/header.css">
        <link rel="stylesheet" href="/css/{{ \Illuminate\Support\Facades\Auth::user()->bio->type }}/log/log.css">
    @else
        <link rel="stylesheet" href="/css/style/shared/shared.css">
        <link rel="stylesheet" href="/css/style/parts/header.css">
        <link rel="stylesheet" href="/css/style/log/log.css">
    @endauth
@endsection

@section('content')
    <div style="font-size: 5vh">{{ __('Login') }}</div>

    <form method="POST" action="{{ route('login') }}">
        <div class="flex-box main-log">
            <div class="log-section">
                @csrf
                <div>
                    <label for="email">{{ __('E-Mail Address') }}</label><br>
                    <input class="input-text" id="email" type="email" name="email" value="{{ old('email') }}" required
                           autofocus>
                </div>

                <div>
                    <label for="password">{{ __('Password') }}</label><br>
                    <input class="input-text" id="password" type="password" name="password" required>
                </div>

                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <button class="input-button" type="submit">
                    {{ __('Login') }}
                </button>
            </div>
            <div class="log-section">
                Login to access the create item features and build up your dashboard
            </div>
        </div>
    </form>
@endsection
