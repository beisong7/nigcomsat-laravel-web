<?php $ver = 0.01; ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NIPTV</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css'.'?v='.$ver) }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css'.'?v='.$ver) }}" rel="stylesheet">
    @if(!empty($styles))
        @foreach(@$styles as $style)
            <link href="{{ asset('css/'.$style.'?v='.$ver) }}" rel="stylesheet">
        @endforeach
    @endif
</head>
<body>
    <div id="app">
        @include('components.navbar')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/main.js'.'?v='.$ver) }}"></script>
    @if(!empty($scripts))
        @foreach($scripts as $script)
            <script src="{{ asset('js/'.$script.'?v='.$ver) }}"></script>
        @endforeach
    @endif

</body>
</html>
