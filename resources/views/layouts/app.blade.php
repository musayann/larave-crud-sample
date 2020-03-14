<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/221ac0e2fd.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
            @include('layouts.nav')
        <div class="@auth flex @endauth min-h-screen">
            @auth
            <div class="w-1/5 bg-white">
                @include('layouts.sidebar')
            </div>
            @endauth
            <div class="@auth w-4/5 @else mt-8 @endauth">
                <div class="container w-4/5 mx-auto py-12">
                @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
