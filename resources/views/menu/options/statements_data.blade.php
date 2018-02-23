@extends('menu.menu_body')

@section('menu-page-title', 'Statements')

@section('menu_options')
    {{--<div class="container">--}}
    {{--<div class="row white">--}}
    {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
    {{--<p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Statements</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{----}}
    {{--<div class="container">--}}
    {{----}}
    <h1>{{$uploaded_file->filename}}</h1>
    <div class="container-fluid">
        <table class="table table-bordered">>
            <thead>
            <tr>
                <th>Vendor Code</th>
                <th>Partner Name</th>
                <th>Login ID</th>
                <th>Bonus Date</th>
                <th>Total Rides</th>
                <th>Unverified Rides</th>
                <th>Rating</th>
                <th>Acceptance</th>
                <th>Total Collection</th>
                <th>Total Fare</th>
                <th>Bonus</th>
                <th>Wallet Balance</th>
            </tr>
            </thead>
            <tbody>
            @foreach($uploaded_file->uploaded_statements as $item)
            <tr>
                <td>{{$item->vendor_code}}</td>
                <td>{{$item->partner_name}}</td>
                <td>{{$item->login_id}}</td>
                <td>{{$item->bonus_time}}</td>
                <td>{{$item->total_riders}}</td>
                <td>{{$item->unverified_riders}}</td>
                <td>{{$item->rating}}</td>
                <td>{{$item->acceptance}}</td>
                <td>{{$item->total_collection}}</td>
                <td>{{$item->total_fare}}</td>
                <td>{{$item->bonus}}</td>
                <td>{{$item->wallet_balance}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection

@section('options_scripts')

@endsection