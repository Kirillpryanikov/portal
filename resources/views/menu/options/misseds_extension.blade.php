@extends('menu.options.bookings')

@section('bookings-menu-page-title', 'Misseds')

@section('booking_extension')

    <!-- Nav tabs -->
    <ul class="nav nav-tabs row gray">
        <li class="nav-item col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
            <a class="nav-link text-center" href="{{route('menu_booking', $driver['_id'])}}">Booking History</a>
        </li>
        <li class="nav-item col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
            <a class="nav-link text-center active not-away"  href="#" role="tab">Missed</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active">
            @if (count($misseds['datas'])!=0)
                @foreach($misseds['datas'] as $missed)
                    @if($booking['trip_no'] != '')
                    <a href="{{route('get_missed_detail', [$missed['trip_no'], $missed['driver_id']])}}" data-row="{{$loop->index+1}}">
                        <div class="row white">
                            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <?php
                                $dateTime = strtotime($missed['created_at']);
                                $dateStr = date('M jS Y', $dateTime);
                                $timeStr = date('g:i A', $dateTime);
                                ?>
                                <p class="time">{{$dateStr}} {{$timeStr}}</p>
                                <h3 class="status status-bookings status-line {{($missed['trip_no']!='')?'green':'orange ml-34'}} mb-1">{{($missed['trip_no']!='')?$missed['trip_no']:''}}</h3>
                            </div>
                            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h3 class="status status-line red pull-right mt-4">{{$missed['status']}}</h3>
                            </div>
                        </div>
                    </a>
                    @endif
                @endforeach
            @else
                <div class="container d-flex justify-content-center mt-3 mb-3">
                    <h5>there is no missed booking</h5>
                </div>
            @endif
            <div class="container d-flex justify-content-center mt-3 mb-3">
                <nav id="missedsPagination" data-id="{{$driver['_id']}}" data-pages="{{$misseds['allPage']}}" data-current="{{$misseds['page']}}" ></nav>
            </div>
        </div>
    </div>
@endsection

@section('options_scripts')
    <script src="{{asset('js/bootpag/bootpag.min.js')}}"></script>
    <script src="{{asset('js/bootpag/bootpag-init.js')}}"></script>
    <script>
        $(document).ready(function () {
            var nav = $('#missedsPagination');
            var driverID = nav.data('id');
            var url = '/missed/'+driverID+'/';
            var totalPages = parseInt(nav.data('pages'));
            var currentPage = parseInt(nav.data('current'));


            if (totalPages>1) {bootpagInit(nav, url, currentPage, totalPages)}


        });

    </script>
@endsection