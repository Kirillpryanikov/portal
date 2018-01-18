<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page-title') | PM Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/tether/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>

<body>
<div id="loader">
    <div id="loading-item">

    </div>
</div>
<header class="d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 text-white d-flex flex-row flex-nowrap justify-content-between align-items-center">
                <h4>Bykea Partner Management Portal  (PMP)</h4>
                @if(isset($driver))
                    <form class="ml-3" action="{{route('Logout_post')}}">
                        {{ csrf_field() }}
                        <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Logout" class="btn btn-default text-danger"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</header>
    @yield('content')
<script src="{{asset('js/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/tether/tether.min.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    @yield('scripts')
<script>
    $(document).on('click', 'a:not(.not-away)', function () {
        $('#loader').addClass('active');
    })
</script>
</body>
</html>