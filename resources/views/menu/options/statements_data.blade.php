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
            <table class="table table-bordered">
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
                    @if(session('user_id'))
                        @if(is_array(session('user_id')))
                            @php $user = session('user_id')[0]; @endphp
                        @else
                            @php $user = session('user_id'); @endphp
                        @endif

                        @if($item->vendor_code == $user)
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
                        @endif
                    @endif
                    @if(session('admin'))
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
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>

@endsection

@section('options_scripts')
    <script src="{{asset('js/bootpag/bootpag.min.js')}}"></script>
    <script src="{{asset('js/bootpag/bootpag-init.js')}}"></script>
    <script>
        $(document).ready(function () {
            var totalPages = parseInt($('#statementsPagination').data('pages'));
            var currentPage = parseInt($('#statementsPagination').data('current'));
            var nav = $('#statementsPagination');

            if (totalPages > 1) {
                bootpagInit(nav, '/get_files/', currentPage, totalPages)
            }
        })
    </script>
@endsection