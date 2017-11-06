@extends('menu.options.bookings')

@section('bookings-menu-page-title', 'Bookings')

@section('booking_extension')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs row gray">
        <li class="nav-item col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
            <a class="nav-link text-center active not-away" href="#">Booking History</a>
        </li>
        <li class="nav-item col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
            <a class="nav-link text-center" href="{{route('menu_missed', $driver['_id'])}}">Missed</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active">
            @foreach($bookings['datas'] as $booking)
                <a href="{{route('get_booking_detail', [$booking['trip_no'], $booking['driver_id']])}}">
                    <div class="row white">
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <?php
                            $dateTime = strtotime($booking['created_at']);
                            $dateStr = date('M jS Y', $dateTime);
                            $timeStr = date('g:i A', $dateTime);
                            ?>
                            <p class="time">{{$dateStr}} {{$timeStr}}</p>
                            <h3 class="status status-bookings status-line green mb-1">{{$booking['trip_no']}}</h3>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">

                            <h3 class="status rs">Rs. {{$rs_booking}}</h3>
                            <p class="time rs-compl mw-100px {{($booking['status']==="cancelled")?'red':'green'}}">{{($booking['status']==="cancelled")?$booking['status'].' by '.$booking['cancel_by']:$booking['status']}}</p>
                        </div>
                        <div class="col-3 col-lg-2 col-md-2 col-sm-2 col-xs-2"> <i class="fa fa-arrow-right pull-right next mt-14"></i> </div>
                    </div>
                </a>
            @endforeach
            <div class="container d-flex justify-content-center mt-3 mb-3">
                <nav id="bookingsPagination" data-id="{{$driver['_id']}}" data-pages="{{$bookings['allPage']}}" data-current="{{$bookings['page']}}" ></nav>
            </div>
        </div>
    </div>
@endsection

@section('options_scripts')
    <script src="{{asset('js/bootpag/bootpag.min.js')}}"></script>
    <script src="{{asset('js/bootpag/bootpag-init.js')}}"></script>
    <script>
        $(document).ready(function () {
            var nav = $('#bookingsPagination');
            var driverID = nav.data('id');
            var url = '/booking/'+driverID+'/';
            var totalPages = parseInt(nav.data('pages'));
            var currentPage = parseInt(nav.data('current'));


            if (totalPages>1) {bootpagInit(nav, url, currentPage, totalPages)}


        });

    </script>
@endsection