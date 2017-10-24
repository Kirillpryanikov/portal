@extends('menu.options.bookings')

@section('booking_extension')

    <!-- Nav tabs -->
    <ul class="nav nav-tabs row gray">
        <li class="nav-item col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
            <a class="nav-link text-center" href="{{route('menu_booking', $driver['_id'])}}">Booking History</a>
        </li>
        <li class="nav-item col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
            <a class="nav-link text-center active"  href="#" role="tab">Missed</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active">
            @foreach($misseds['datas'] as $missed)
                <a href="{{route('get_missed_detail', [$missed['trip_no'], $missed['driver_id']])}}" data-row="{{$loop->index+1}}">
                    <div class="row white">
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <p class="time">{{$missed['created_at']}}</p>
                            <h3 class="status status-bookings status-line green">{{$missed['trip_no']}}</h3>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <h3 class="status status-line red pull-right mt-4">{{$missed['status']}}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
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
            var url = '/booking/'+driverID+'/';
            var totalPages = parseInt(nav.data('pages'));
            var currentPage = parseInt(nav.data('current'));


            if (totalPages>1) {bootpagInit(nav, url, currentPage, totalPages)}


        });

    </script>
@endsection