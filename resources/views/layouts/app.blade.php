<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Health Monitoring System') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    @include('_includes.nav.main')
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiUrlS590suj6RsjaW3UgIKBXgrIkfoP8 &libraries=places"
    async="" defer=""></script>
    <script src="{{asset('js/mapscript.js')}}"></script>
    @yield('scripts')
</body>
</html>
