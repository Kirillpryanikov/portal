@extends('menu.menu_body')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Complaints Filed</p>
            </div>
        </div>
    </div>
    <div class="container">

        <!----------------------------------------->
        <div class="row gray">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h1 class="status text-center">Complaints Filed</h1>
            </div>
        </div>
        <!----------------------------------------->

        <!----------------------------------------->
        <!----------------------------------------->

        <div class="row gray">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <h3 class="status fz-16">Date</h3>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <h3 class="status fz-16">Details</h3>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <h3 class="status fz-16">Trip ID</h3>
            </div>
        </div>
        <!----------------------------------------->

        <!----------------------------------------->
        <div id="complaintsTable" data-count="{{count($complaints_fileds)}}">
        @foreach($complaints_fileds as $complaints_filed)
        <?php
        $dateTime = strtotime($complaints_filed['created_at']);
        $dateStr = date('j M', $dateTime);
        ?>
        <div class="row white">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status fz-16"><?php echo $dateStr ?></h3>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                <p class="time fz-14">{{$complaints_filed['description']}}</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <p class="time fz-14">{{$complaints_filed['trip_id']}}</p>
            </div>
        </div>
        @endforeach
            <nav id="complaintsPagination" class="mt-4 collapse" aria-label="Complaints navigation">
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
            var cancelledItemsCount = $('#complaintsTable').data('count');

            if (cancelledItemsCount > 20) {
                paginationHandler('#complaintsTable', '#complaintsPagination', cancelledItemsCount)
            }
        })
    </script>
@endsection