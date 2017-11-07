@extends('menu.menu_body')

@section('menu-page-title', 'Personal Menu')

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
            <div class="col-9 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Bookings</h3>
            </div>
            <div class="col-3 col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!-------------------https://www.google.com/maps/search/33.66877,73.0755083---------------------->
    <a class="to-map not-away" href="https://www.google.com/maps/search/{{$driver['last_lat']}},{{$driver['last_lng']}}">
        <div class="row white">
            <div class="col-9 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Location</h3>
            </div>
            <div class="col-3 col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <a href="{{route('get_wallets', $driver['_id'])}}">
        <div class="row white">
            <div class="col-9 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Wallet</h3>
            </div>
            <div class="col-3 col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <a href="{{route('get_driver_profile', $driver['_id'])}}">
        <div class="row white">
            <div class="col-9 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Profile</h3>
            </div>
            <div class="col-3 col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <a href="{{route('get_complaints_filed', $driver['_id'])}}">
        <div class="row white">
            <div class="col-9 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Complaints filed</h3>
            </div>
            <div class="col-3 col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <a href="{{route('get_statements', $driver['_id'])}}">
        <div class="row white">
            <div class="col-9 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Statements</h3>
            </div>
            <div class="col-3 col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->

</div>
@endsection

@section('options_scripts')

    <script>
        $(document).ready(function () {
            $("a.to-map").on("click",function(e){
                e.preventDefault();
                var address = $(this).attr('href');
                window.open(address,'_blank');
            });

        })
    </script>
@endsection