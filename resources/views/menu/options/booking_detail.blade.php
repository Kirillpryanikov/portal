@extends('menu.menu_body')

@section('menu_options')
    <div class="container">
        <br>
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {{--<p class=""><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; <a href="{{route('menu_booking', $driver['_id'])}}">Bookings</a> &gt; Detail</p>--}}
            </div>
        </div>
    </div>

    <div class="container">

        <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1" style="background-color:#FFF;">
                <h3 class="status text-center">KHI8986580</h3>
            </div>
        </div>
        <!----------------------------------------->

        <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1">
                <h3 class="status font-thin fz-16"><span class="font-bold">Pick Up: </span>Khayaban-e-Ittihad</h3>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1">
                <h3 class="status font-thin fz-16" ><span class="font-bold">Drop Off: </span>Saddar Town</h3>
            </div>
        </div>
        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Booking Time</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">22 aug, 10:38 AM</h3>
            </div>
        </div>
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Service Type</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">Ride</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">12 km</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">48</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">28 min</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">42</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Base Fare</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">35</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Fare</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">125</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Promo</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">0</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Wallet</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">-100</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left fz-24">Total</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-24">Rs 125</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row" class="white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left green">Amount Top Up</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">Rs. 125</h3>
            </div>
        </div>

        <!----------------------------------------->

    </div>
@endsection

@section('options_scripts')
    {{--<script>
        $('#bookings').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            console.log('Bookings selected');
        })
        $('#cancelled').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            console.log('Cancelled selected');
        })
    </script>--}}
@endsection
