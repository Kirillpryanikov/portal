@extends('menu.menu_body')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu', $driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Profile</p>
            </div>
        </div>
    </div>

    <div class="container">
        <!----------------------------------------->
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h1 class="status text-center">Settings</h1>
            </div>
        </div>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">GPS</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['last_lat']}}&nbsp;{{$driver['last_lng']}}</h3>
                </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Address</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['address']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">City</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['address']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">License #</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['driver_license_number']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Company Provided)</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['phone']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!-----------------------------------------> <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Personal 1)</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['mobile_1']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!-----------------------------------------> <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Personal 2)</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['mobile_2']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Email</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 class="driver-name font-thin">{{$driver['email']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="settings-change.php">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Activation</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">{{$driver['updated_at']}}</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="checkbox" data-id="{{$driver['_id']}}" class="pull-right">
                    <h3 class="driver-name pull-right red"> Deactive</h3>
                </div>
            </div>
        </a>
        <!----------------------------------------->

    </div>

@endsection

@section('options_scripts')
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"]').on('click', function (e) {
                var id = $(this).data('id');
                var data ={};
                var isChecked = $(this).is(":checked");
                console.log(id);
                if (isChecked)
                {
                    data = {id: id, activated: true};
                } else {
                    data = {id: id, activated: false};
                }

                $.ajax({
                    url: "#",
                    method: 'post',
                    data: data
                }).done(function() {
                    if (isChecked) {
                        $( this ).siblings('driver-name').addClass('red').text('Deactivate');
                        $( this ).siblings('driver-name').removeClass('green').text('Activate');
                    } else {
                        $( this ).siblings('driver-name').addClass('green').text('Activate');
                        $( this ).siblings('driver-name').removeClass('red').text('Deactivate');
                    }

                });

            })
        })
    </script>
@endsection