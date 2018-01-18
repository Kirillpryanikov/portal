@extends('menu.menu_body')

@section('menu-page-title')
@yield('bookings-menu-page-title')
@endsection

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Bookings</p>
            </div>
        </div>
    </div>

    <div class="container">


        @yield('booking_extension')


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

    @yield('options_scripts')

@endsection

