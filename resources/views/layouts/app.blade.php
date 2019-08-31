<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Pop Shop')</title>

    <link rel="stylesheet" href="/css/shared/shared.css">
    <link rel="stylesheet" href="/css/parts/header.css">
    <script src="/js/app.js"></script>
    @yield('styles')
</head>
<body>
<div id="app">
    @include('layouts.parts.header')
    <div class="container">
        <div class="nav-item search-bar">
            <button>S</button>
            <input type="search" placeholder="Search Item">
        </div>
        @yield('content')
    </div>
</div>

@include('layouts.parts.footer')
<script>
    let app = new Vue({
        el: '#app',
    });
</script>

</body>
</html>


