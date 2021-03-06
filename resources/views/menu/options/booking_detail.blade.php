@extends('menu.menu_body')

@section('menu-page-title', 'Details')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; <a href="{{route('menu_booking', $driver['_id'])}}">Bookings</a> &gt; Details</p>
            </div>
        </div>
    </div>

    <div class="container">

        <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h3 class="status text-center">{{isset($details['trip_no'])?$details['trip_no']:'TRIP'}}</h3>
            </div>
        </div>
        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1">
                <h3 class="status font-thin fz-16"><span class="font-bold">Pick Up: </span>{{isset($trip['start_address'])?$trip['start_address']:''}}</h3>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1">
                <h3 class="status font-thin fz-16" ><span class="font-bold">Drop Off: </span>{{isset($trip['end_address'])?$trip['end_address']:''}}</h3>
            </div>
        </div>
        <!----------------------------------------->

    <?php
    $dateTime = strtotime($trip['created_at']);
    $dateStr = date('M jS Y g:i A', $dateTime);

            if (isset($trip['accpted_time'])) {
                $ttt = collect($trip['accpted_time'])->toArray();
                if (isset($ttt['$date']['$numberLong'])){
                    $dateTimeMS = (int)$ttt['$date']['$numberLong'];
                    $dateTimeS = round($dateTimeMS/1000);
                    $dateStr = date('M jS Y g:i A', $dateTimeS);
                }
            }
    ?>

<!----------------------------------------->
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Booking Time</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">{{$dateStr}}</h3>
            </div>
        </div>
        <div class="row white">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Service Type</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">{{$trip['trip_type']}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">{{$details['km']}} km</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">{{$details['price_km']}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">{{$details['minutes']}} min</h3>
            </div>
            <?php $cost = $details['minutes'] * $details['price_per_minute']; ?>

            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16"><?php echo $cost; ?></h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Base Fare</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">{{$details['base_fare']}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Fare</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">{{$details['trip_charges']}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Promo</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">{{$details['promo_deduction']}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row white">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left">Wallet</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">{{$details['wallet_deduction']}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left fz-24">Total</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-24">Rs {{$details['total']}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row white">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-left green">Amount Top Up</h3>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right font-thin fz-16">Rs. {{$details['remaining_amount']}}</h3>
            </div>
        </div>

        <!----------------------------------------->

    </div>
@endsection

@section('options_scripts')

@endsection
