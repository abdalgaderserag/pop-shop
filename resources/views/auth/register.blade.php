@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/shared/shared.css">
    <link rel="stylesheet" href="/css/parts/header.css">
    <link rel="stylesheet" href="/css/log/log.css">
@endsection

@section('content')
    <div style="font-size: 5vh">{{ __('Register') }}</div>

    <form method="POST" action="{{ route('register') }}">
        <div class="flex-box main-log">
            <div class="log-section">
                @csrf
                <div>
                    <label for="name">{{ __('Name') }}</label><br>
                    <input id="name" type="text" class="input-text"
                           name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div>
                    <label for="email">{{ __('E-Mail Address') }}</label><br>
                    <input id="email" type="email" class="input-text" name="email" value="{{ old('email') }}" required>
                </div>

                <div>
                    <label for="password">{{ __('Password') }}</label><br>
                    <input id="password" type="password" class="input-text" name="password" required>
                </div>

                <div>
                    <label for="password-confirm">{{ __('Confirm Password') }}</label><br>
                    <input id="password-confirm" type="password" class="input-text"
                           name="password_confirmation" required>
                </div>

                <button style="margin-top: 24px" type="submit" class="input-button">
                    {{ __('Register') }}
                </button>
            </div>
            <div class="log-section">
                Rigster to post your first item
            </div>
        </div>
    </form>
@endsection
