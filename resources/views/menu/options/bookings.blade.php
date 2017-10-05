@extends('menu.menu_body')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p style="" class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Bookings</p>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs row gray" role="tablist">
            <li class="nav-item col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                <a class="nav-link text-center active" data-toggle="tab" id="bookings" href="#bookingsSection" role="tab">Booking History</a>
            </li>
            <li class="nav-item col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                <a class="nav-link text-center" data-toggle="tab" id="cancelled" href="#cancelledSection" role="tab">Missed</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php  $rs_driver = count($bookings); ?>
            <div class="tab-pane active" data-count="{{count($bookings)}}" id="bookingsSection" role="tabpanel">
                @foreach($bookings as $booking)
                    <a href="{{route('get_booking_detail', $booking['_id'])}}" class="collapse">
                        <div class="row white">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                <p class="time">{{$booking['created_at']}}</p>
                                <h3 class="status status-bookings status-line green">{{$booking['trip_no']}}</h3>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">

                                <h3 class="status rs">Rs. {{$rs_driver}}</h3>
                                <p class="time rs-compl green">{{$booking['status']}}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"> <i class="fa fa-arrow-right pull-right next mt-14"></i> </div>
                        </div>
                    </a>
                @endforeach
                <nav id="bookingsPagination" class="mt-4 collapse" aria-label="Bookings navigation">
                    <ul class="pagination justify-content-center"></ul>
                </nav>
            </div>
            <div class="tab-pane" data-count="{{count($misseds)}}" id="cancelledSection" role="tabpanel">
                @foreach($misseds as $missed)
                <a href="{{route('get_missed_detail', $missed['_id'])}}" class="collapse" data-row="{{$loop->index+1}}">
                    <div class="row white">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <p class="time">{{$missed['created_at']}}</p>
                            <h3 class="status status-bookings status-line green">{{$missed['trip_no']}}</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h3 class="status status-line red pull-right mt-4">{{$missed['status']}}</h3>
                        </div>
                    </div>
                </a>
                @endforeach
                <nav id="missedsPagination" class="mt-4 collapse" aria-label="Misseds navigation">
                    <ul class="pagination justify-content-center"></ul>
                </nav>
            </div>
        </div>

        <!----------------------------------------->



    </div>

@endsection

@section('options_scripts')
    <script src="{{asset('js/pagination/pagination.js')}}"></script>

    <script>
        $(document).ready(function () {
            var cancelledItemsCount = $('#cancelledSection').data('count');
            var bookedItemsCount = $('#bookingsSection').data('count');

            if (cancelledItemsCount>20) {paginationHandler('#cancelledSection', '#missedsPagination', cancelledItemsCount)}
            if (bookedItemsCount>20) {paginationHandler('#bookingsSection', '#bookingsPagination', bookedItemsCount)}
        })
    </script>
@endsection

