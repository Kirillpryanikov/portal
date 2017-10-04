@extends('layouts.base')

@section('content')
    <div class="container"> <br>
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class=""><a href="{{route('menu')}}">Drivers Names</a> &gt; Links</p>
            </div>
        </div>
    </div>


    @yield('menu_options')

@endsection

@section('scripts')



    @yield('options_scripts')

@endsection