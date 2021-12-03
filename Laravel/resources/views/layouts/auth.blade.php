<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Step4Tech | {{$title}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/common/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app-login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/nav.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/lib/fontawesome.js') }}"></script>
    <script src="{{ asset('js/lib/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/common/nav.js') }}"></script>
</head>

<body>
    @include('common.nav')
    <div class="main-container">
        <div class="clearfix">
            <div class="font-sans text-gray-900 antialiased">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>