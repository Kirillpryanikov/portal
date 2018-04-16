@extends('menu.menu_body')

@section('menu-page-title', 'Wallet')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Wallet</p>
            </div>
        </div>
    </div>

    <div class="container">
    <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h1 class="status text-center">Wallet</h1>
            </div>
        </div>
        <!----------------------------------------->

        <!----------------------------------------->{{--
        <div class="row bg-green">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status text-white">Balance</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right text-white">Rs. {{$wallets_rs}}</h3>
            </div>
        </div> --}}

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row gray">
            <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Titles</h3>
            </div>
            <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Amount</h3>
            </div>
            <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Transfer</h3>
            </div>
            <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Balance</h3>
            </div>
        </div>
        <!----------------------------------------->

        <!----------------------------------------->
        @foreach($wallets['datas'] as $wallet)
            <?php
            $dateTime = strtotime($wallet['created_at']);
            $dateStr = date('M jS Y', $dateTime);
            $timeStr = date('g:i A', $dateTime);
            ?>
            <div class="row white">
                <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    @if(isset($wallet['trip_no']))
                    <p class="fz-10 mt-20 mb-10">{{$wallet['trip_no']}}</p>
                    <h3 class="status m-0 fz-16 p-0">{{$wallet['title']}}</h3>
                    <p class="mb-10 fz-10 mt-10">{{$wallet['comments']}}</p>
                    @endif
                </div>
                <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <h3 class="status mt-45 fz-16 p-0 text-center green">{{$wallet['total']}}</h3>
                </div>
                <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p class="fz-10 mt-20 mb-10">{{$dateStr}} {{$timeStr}}</p>
                    <h3 class="status m-0 p-0 fz-16">{{$wallet['transfer']}}</h3>
                    <p class="time fz-10 mt-10">&nbsp;</p>
                </div>
                <div class="col-3 col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <h3 class="status mt-45  p-0 fz-16 text-center green">{{$wallet['balance']}}</h3>
                </div>
            </div>
        @endforeach
        <div class="container d-flex justify-content-center mt-3 mb-3">
            <nav id="walletPagination" data-id="{{$driver['_id']}}" data-pages="{{$wallets['allPage']}}" data-current="{{$wallets['page']}}" ></nav>
        </div>
    <!----------------------------------------->
    </div>

@endsection

@section('options_scripts')
    <script src="{{asset('js/bootpag/bootpag.min.js')}}"></script>
    <script src="{{asset('js/bootpag/bootpag-init.js')}}"></script>
    <script>
        $(document).ready(function () {
            var nav = $('#walletPagination');
            var driverID = nav.data('id');
            var url = '/wallet/'+driverID+'/';
            var totalPages = parseInt(nav.data('pages'));
            var currentPage = parseInt(nav.data('current'));


            if (totalPages>1) {bootpagInit(nav, url, currentPage, totalPages)}


        });

    </script>
@endsection
