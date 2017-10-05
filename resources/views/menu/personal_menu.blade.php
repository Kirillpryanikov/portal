@extends('menu.menu_body')

@section('menu_options')
<div class="container">
    <div class="row white">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; {{$driver['full_name']}}</p>
        </div>
    </div>
</div>

<div class="container">

    <!----------------------------------------->
    <a href="{{route('menu_booking', $driver['_id'])}}">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name">Bookings</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="https://www.google.com/maps/place/Karachi,+Pakistan/@25.0115052,66.7845092,10z/data=!3m1!4b1!4m5!3m4!1s0x3eb33e06651d4bbf:0x9cf92f44555a0c23!8m2!3d24.8614622!4d67.0099388">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name">Location</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="wallet.php">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name">Wallet</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="{{route('get_driver_profile', $driver['_id'])}}">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name">Profile</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="complaints-filed.php">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name">Complaints filed</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="statements.php">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name">Statements</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->

</div>
@endsection