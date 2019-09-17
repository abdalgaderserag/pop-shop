<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Pop Shop')</title>

    @yield('styles')
</head>
<body>
<div id="app">

    @include('layouts.parts.header')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.parts.footer')
</div>
<script src="/js/app.js"></script>
<script>
    @if(session()->has('access_token'))
        axios.defaults.headers.common['Authorization'] = 'Bearer {{ \Illuminate\Support\Facades\Session::get('access_token') }}';
            @endif

    let app = new Vue({
            el: '#app',
            data: {
                hart: '<3',
            },
        });
</script>

</body>
</html>


