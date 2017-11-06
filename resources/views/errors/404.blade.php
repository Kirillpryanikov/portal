@extends('layouts.base')

@section('page-title', '404')

@section('content')
    <div class="container">
        <!----------------------------------------->
        <div class="row col-10 offset-1 col-sm-6 offset-sm-3 mt-20vh">
            <div class="bg-white">
                <img src="{{asset('images/not_found.jpg')}}" style="max-width: 100%;height: auto" alt="Not Found">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h1 class="status text-center not-found">Not found!</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h4 class="status text-center">Page you are looking for has been removed or not exist</h4>
            </div>
        </div>
        <!----------------------------------------->

    </div>
@endsection