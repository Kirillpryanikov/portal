@extends('menu.menu_body')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Statements</p>
            </div>
        </div>
    </div>

    <div class="container">

        <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h1 class="status text-center">Statements</h1>
            </div>
        </div>

        <div class="row">
            <div class="container d-flex flex-wrap">
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column">
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Total Rides</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['total_rides']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Imei</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['fake_imei']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Less Than 1 km</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['less_than_1_km']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Repeat Ride</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['repeat_ride']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Collection</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['collection']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Expected Collection</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['expected_collection']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Short Collection</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['short_collection']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Bonus</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['bonus']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Topup</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['fake_topup']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">User Penalty</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['customer_complain_penalty']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Misuse App</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['misuse_app']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Time Block Penalty</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['time_block_penalty']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Ride</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['fake_ride']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Customer</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['fake_customer']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Total Penalty</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{$statements['total_penalty']}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top">
                        <h3 class="status m-0 text-center">Date</h3>
                    </div>
                    <?php
                    $dateTime = strtotime($statements['Date']);
                    $dateStr = date('j M', $dateTime);
                    ?>
                    <p class="text-center fz-14 mt-10">{{$dateStr}}</p>
                </div>
            </div>
        </div>

        <!----------------------------------------->

    </div>

@endsection

@section('options_scripts')

@endsection