@extends('layouts.base')

@section('password_link')
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 hgt-54 d-flex align-items-center">
    <a class="text-white" href="change-password.php">Change Password</a>
</div>
@endsection

@section('content')
<div class="container">
    <!----------------------------------------->
    <div class="row gray">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3 class="status">Driver Name</h3>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3 class="status">Status</h3>
        </div>
    </div>
    <!----------------------------------------->
    <!----------------------------------------->
    @foreach($drivers as $driver)
        @php
        $class_var = '';
            switch ($driver['driver_status']) {
            case 'free':
                $class_var = 'orange';
                break;
            case 'inactive':
                $class_var = 'red';
                break;
            case 'On Pickup':
            case 'On Ride':
            case 'Invoice':
                $class_var = 'green';
                break;
            }
        @endphp
        <a href="{{route('personal_menu',$driver['_id'])}}">
        <div class="row white">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status font-thin">{{$driver['full_name']}}</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status font-thin {{$class_var}}">{{$driver['driver_status']}}</h3>
            </div>
        </div>
        </a>
    @endforeach


</div>
@endsection