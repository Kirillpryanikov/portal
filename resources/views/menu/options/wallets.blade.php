@extends('menu.menu_body')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {{--<p style="" class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Wallets</p>--}}
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

        <!----------------------------------------->
        <div class="row bg-green">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status text-white">Balance</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status pull-right text-white">Rs. {{count($wallets)}}</h3>
            </div>
        </div>

        <!----------------------------------------->
        <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Titles</h3>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Amount</h3>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Transfer</h3>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status text-center fz-16">Balance</h3>
            </div>
        </div>
        <!----------------------------------------->

        <!----------------------------------------->
        <div id="walletTable" data-count="{{count($wallets)}}">
        @foreach($wallets as $wallet)
            <?php
            $dateTime = strtotime($wallet['created_at']);
            $dateStr = date('j M', $dateTime);
            $timeStr = date('g:i A', $dateTime);
            ?>
            <div class="row white collapse">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p class="fz-10 mt-20 mb-10">{{$wallet['trip_no']}}</p>
                    <h3 class="status m-0 fz-16 p-0">{{$wallet['title']}}</h3>
                    <p class="mb-10 fz-10 mt-10">{{$wallet['last_received_via']}}</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <h3 class="status mt-45 fz-16 p-0 text-center green">{{$wallet['total']}}</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p class="fz-10 mt-20 mb-10"><?php echo $dateStr;?></p>
                    <h3 class="status m-0 p-0 fz-16">{{$wallet['transfer']}}</h3>
                    <p class="time fz-10 mt-10"><?php echo $timeStr;?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <h3 class="status mt-45  p-0 fz-16 text-center green">{{$wallet['balance']}}</h3>
                </div>
            </div>
        @endforeach
            <nav id="walletsPagination" class="mt-4 collapse" aria-label="Wallets navigation">
                <ul class="pagination justify-content-center"></ul>
            </nav>
        </div>
    <!----------------------------------------->
    </div>

@endsection

@section('options_scripts')
    <script src="{{asset('js/pagination/pagination.js')}}"></script>

    <script>
        $(document).ready(function () {
            var cancelledItemsCount = $('#walletTable').data('count');

            if (cancelledItemsCount > 20) {
                paginationHandler('#walletTable', '#walletsPagination', cancelledItemsCount)
            }
        })
    </script>
@endsection