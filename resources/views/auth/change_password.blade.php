@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="mt-10vh">
            <div class="full-width">
                <div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 class="text-center heading-1">Change Password</h1>
                    </div>
                </div>
                <div class="mt-20">
                    <form id="changePasswordForm" class="full-width" method="POST" action="">
                        {{ csrf_field() }}
                        {{--<input type="hidden" name="driver_id" value="{{$driver['_id']}}">--}}
                        <input type="password" name="password_old"  class="form-control login-input"
                               placeholder="Enter old password" required>
                        <input type="password" name="password_new"  class="form-control login-input mt-20"
                               placeholder="Enter new password" required>
                        <input type="password" name="password_new_1"  class="form-control login-input mt-20"
                                   placeholder="Confirm new password" required>
                        <button type="submit" class="modal-submit mt-20">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
