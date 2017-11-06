@extends('menu.menu_body')

@section('menu-page-title', 'Statements')

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
                    <p class="text-center fz-14 mt-10">{{isset($statements['total_rides'])?$statements['total_rides']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Imei</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['fake_imei'])?$statements['fake_imei']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Less Than 1 km</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['less_than_1_km'])?$statements['less_than_1_km']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Repeat Ride</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['repeat_ride'])?$statements['repeat_ride']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Collection</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['collection'])?$statements['collection']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Expected Collection</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['expected_collection'])?$statements['expected_collection']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Short Collection</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['short_collection'])?$statements['short_collection']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Bonus</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['bonus'])?$statements['bonus']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Topup</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['fake_topup'])?$statements['fake_topup']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">User Penalty</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['customer_complain_penalty'])?$statements['customer_complain_penalty']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Misuse App</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['misuse_app'])?$statements['misuse_app']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Time Block Penalty</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['time_block_penalty'])?$statements['time_block_penalty']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Ride</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['fake_ride'])?$statements['fake_ride']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Fake Customer</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['fake_customer'])?$statements['fake_customer']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top" >
                        <h3 class="status m-0 text-center">Total Penalty</h3>
                    </div>
                    <p class="text-center fz-14 mt-10">{{isset($statements['total_penalty'])?$statements['total_penalty']:'0'}}</p>
                </div>
                <div class="col-sm-4 col-xs-4 m-0 p-0 statements-column" >
                    <div class="gray statements-top">
                        <h3 class="status m-0 text-center">Date</h3>
                    </div>
                    <?php
                        if (isset($statements['Date'])) {
                            $dateTime = strtotime($statements['Date']);
                            $dateStr = date('j M', $dateTime);
                        } else {
                            $dateStr = 'N/A';
                        }
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