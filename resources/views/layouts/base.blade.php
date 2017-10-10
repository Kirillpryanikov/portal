<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Untitled Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/tether/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 hgt-54 d-flex align-items-center">
                <img src="{{asset('images/logo.gif')}}" width="80" height="25" alt="logo"/>
            </div>
            @yield('password_link')
        </div>
    </div>
</header>
    @yield('content')
<script src="{{asset('js/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/tether/tether.min.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    @yield('scripts')
</body>
</html>