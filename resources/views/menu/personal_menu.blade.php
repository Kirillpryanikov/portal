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
                <h3 class="driver-name font-thin">Bookings</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <?php $linkedAddress = str_replace ( " " , "+" , $driver['address'] )?>
    <a href="https://www.google.com/maps/place/<?php echo $linkedAddress?>">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Location</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="{{route('get_wallets', $driver['_id'])}}">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Wallet</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="{{route('get_driver_profile', $driver['_id'])}}">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Profile</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="{{route('get_complaints_filed', $driver['_id'])}}">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Complaints filed</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->
    <!----------------------------------------->
    <a href="{{route('get_statements', $driver['_id'])}}">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="driver-name font-thin">Statements</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-arrow-right pull-right next"></i> </div>
        </div>
    </a>
    <!----------------------------------------->

</div>
@endsection

@section('options_scripts')

    <script>
        $(document).ready(function () {
            console.log($('#linkToMap').data('address'));

        })
    </script>
@endsection