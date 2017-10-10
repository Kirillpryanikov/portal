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
        <!----------------------------------------->


        <!----------------------------------------->
        <!----------------------------------------->

        <div class="row gray">
            <div class="text-center col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <h3 class="status fz-16">Date</h3>
            </div>
            <div class="text-center col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <h3 class="status fz-16">Details</h3>
            </div>
            <div class="text-center col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <h3 class="status fz-16">Payouts</h3>
            </div>

        </div>
        <!----------------------------------------->

        <!----------------------------------------->
        <div id="statementsTable" data-count="{{count($statements)}}">
        @foreach($statements as $statement)
                <?php
                $dateTime = strtotime($statement['created_at']);
                $dateStr = date('j M', $dateTime);
                ?>
        <div class="row white collapse">
            <div class="text-center col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <h3 class="status fz-16"><?php echo $dateStr ?></h3>
            </div>
            <div class="text-center col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <p class="time fz-14">{{$statement['status']}}</p>
            </div>
            <div class="text-center col-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <a href="{{asset('images/Test.pdf')}}">
                    <i class="fa fa-download next fz-24 text-center"></i>
                </a>
            </div>

        </div>
        @endforeach
            <nav id="statementsPagination" class="mt-4 collapse" aria-label="Statements navigation">
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
            var cancelledItemsCount = $('#statementsTable').data('count');

            if (cancelledItemsCount > 20) {
                paginationHandler('#statementsTable', '#statementsPagination', cancelledItemsCount)
            }
        })
    </script>
@endsection