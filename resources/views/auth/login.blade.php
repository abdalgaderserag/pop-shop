@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/shared/shared.css">
    <link rel="stylesheet" href="/css/parts/header.css">
    <link rel="stylesheet" href="/css/log/log.css">
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
