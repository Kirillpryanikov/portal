
<style type="text/css">
    .col-10,.col-2,.col-8
    {
        position:relative;
        width:100%;
        min-height:1px;
        padding-right:15px;
        padding-left:15px
    }
    .col-2
    {
        -webkit-box-flex:0;
        -webkit-flex:0 0 16.666667%;
        -ms-flex:0 0 16.666667%;
        flex:0 0 16.666667%;
        max-width:16.666667%
    }
    .col-8
    {
        -webkit-box-flex:0;
        -webkit-flex:0 0 66.666667%;
        -ms-flex:0 0 66.666667%;
        flex:0 0 66.666667%;
        max-width:66.666667%
    }
    .col-10
    {
        -webkit-box-flex:0;
        -webkit-flex:0 0 83.333333%;
        -ms-flex:0 0 83.333333%;
        flex:0 0 83.333333%;
        max-width:83.333333%
    }
    .row{
        display:-webkit-box;
        display:-webkit-flex;
        display:-ms-flexbox;
        display:flex;
        -webkit-flex-wrap:wrap;
        -ms-flex-wrap:wrap;
        flex-wrap:wrap;
        margin-right:-15px;
        margin-left:-15px
    }
    .container{
        padding-right:0;
        padding-left:0;
        display:-webkit-box;
        display:-webkit-flex;
        display:-ms-flexbox;
        display:flex;
        -webkit-flex-wrap:nowrap;
        -ms-flex-wrap:nowrap;
        flex-wrap:nowrap;
        -webkit-box-align:center;
        -webkit-align-items:center;
        -ms-flex-align:center;
        align-items:center
    }
</style>
<?php
$current = $data['param_name'] !='city'?$data['driver'][$data['param_name']]:$data['city_data']['name'];
$label = 'Email';

if($data['param_name'] == 'gps_coords'){
    $label = 'GPS';
} elseif($data['param_name'] == 'address'){
    $label = 'Address';
} elseif($data['param_name'] == 'city'){
    $label = 'City';
} elseif($data['param_name'] == 'driver_license_number'){
    $label = 'License #';
} elseif($data['param_name'] == 'phone'){
    $label = 'Mobile (Company provided)';
} elseif($data['param_name'] == 'mobile_1'){
    $label = 'Mobile (Personal 1)';
} elseif($data['param_name'] == 'mobile_2'){
    $label = 'Mobile (Personal 2)';
}
?>

<div class="container row">
    <div class="col-8">
        <div class="row">
            <div class="col-2"><h3>Driver:</h3></div>
            <div class="col-10">{{$data['driver']['full_name']}}</div>
        </div>
        <br>
        <div class="row">
            <div class="col-2"><h3>Label:</h3></div>
            <div class="col-10">{{$label}}</div>
        </div>
        <br>
        <div class="row">
            <div class="col-2"><h3>Current Value:</h3></div>
            <div class="col-10">{{$current}}</div>
        </div>
        <br>
        <div class="row">
            <div class="col-2"><h3>New Value:</h3></div>
            <div class="col-10">{{$data['param_value']}}</div>
        </div>
    </div>
</div>