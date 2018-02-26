@extends('layouts.base')

@section('page-title', 'Partners')

@section('content')
    @if(session('admin') == 'true')
        <div class="container text-center my-2">
        <form method="post" id="upload"
              enctype="multipart/form-data">
            {{csrf_field()}}
            <span>Upload .csv files:&nbsp&nbsp&nbsp</span>
            <input type="file" accept=".csv" id="files" name="files[]" multiple>
            <button type="submit" formaction="{{url('/file')}}" id="filesBtn" form="upload"
                    class="btn btn-default">
                <span class="glyphicon glyphicon-upload"></span> Upload New Data
            </button>
        </form>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('status') }}
                </div>
            @endif
        </div>
    @endif
    <div class="container">
        <!----------------------------------------->
        <div class="row gray">
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <h3 class="status">Partner's Name</h3>
            </div>
            <div class="col-3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status">Wallet Balance</h3>
            </div>
            <div class="col-3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <h3 class="status">Status</h3>
            </div>
        </div>
        <!----------------------------------------->
        <!----------------------------------------->
        @foreach($drivers['datas'] as $driver)
            @php
                $class_var = '';
                    switch ($driver['driver_status']) {
                    case 'free':
                        $class_var = 'orange';
                        break;
                    case 'inactive':
                        $class_var = 'red';
                        break;
                    case 'On Pickup':
                    case 'On Ride':
                    case 'Invoice':
                        $class_var = 'green';
                        break;
                    }
            @endphp
            <a href="{{route('personal_menu',$driver['_id'])}}">
                <div class="row white">
                    <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="status font-thin">{{$driver['full_name']}}</h3>
                    </div>
                    <div class="col-3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h3 class="status font-thin">{{$driver['wallet']}}</h3>
                    </div>
                    <div class="col-3 text-right col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h3 class="status font-thin {{$class_var}}">{{$driver['driver_status']}}</h3>
                    </div>
                </div>
            </a>
        @endforeach
        <div class="container d-flex justify-content-center mt-3 mb-3">
            <nav id="driversPagination" data-pages="{{$drivers['allPage']}}" data-current="{{$drivers['page']}}"></nav>
        </div>


    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/bootpag/bootpag.min.js')}}"></script>
    <script src="{{asset('js/bootpag/bootpag-init.js')}}"></script>
    <script>
        $(document).ready(function () {
            var totalPages = parseInt($('#driversPagination').data('pages'));
            var currentPage = parseInt($('#driversPagination').data('current'));
            var nav = $('#driversPagination');

            if (totalPages > 1) {
                bootpagInit(nav, '/menu/', currentPage, totalPages)
            }


        });

    </script>
@endsection