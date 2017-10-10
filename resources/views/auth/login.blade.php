@extends('layouts.base')

@section('content')
<div class="container">
    <div class="mt-10vh">
            <div class="full-width">
                <div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 class="text-center heading-1">Investor Portal</h1>
                    </div>
                </div>
                <div class="mt-20">
                    <form id="loginForm" class="full-width" method="POST" action="{{route('Login_post')}}">
                        {{ csrf_field() }}
                        <div class="input-group mt-20">
                            <span class="input-group-addon" id="basic-addon3"><i class="fa fa-user text-white"></i></span>
                            <input type="text" name="username" id="username" class="form-control login-input" aria-describedby="emailHelp" placeholder="Enter user name" required>
                        </div>
                        <div class="input-group mt-20">
                            <span class="input-group-addon" id="basic-addon3"><i class="fa fa-user text-white"></i></span>
                            <input type="password" name="password" class="form-control login-input" id="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="modal-submit mt-20">LOG IN</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
