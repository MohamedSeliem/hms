
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Health Monitoring System') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
     @yield('styles')
</head>

<body>
    <div id="dash">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ99YneQpBoEoTbH39i4diWBqjqVt59fg &libraries=places"
    async="" defer=""></script>
    <script src="{{asset('js/mapscript.js')}}"></script>
        <!--   Core JS Files   -->
    <script src="{{asset('js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="{{asset('js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('js/bootstrap-notify.js')}}"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{asset('js/light-bootstrap-dashboard.js')}}"></script>

    <script>
        $().ready(function(){
            demo.initGoogleMaps();
        });
    </script>
    @yield('scripts')
</body>
</html>