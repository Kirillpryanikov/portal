@extends('layouts.base')

@section('page-title', 'Change Password')

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
                    <form id="changePasswordForm" class="full-width" method="POST" action="{{route('change_password_post')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="password" name="password_old" id="password_old"  class="form-control login-input"
                               placeholder="Enter old password" required>
                        <input type="password" name="password_new" id="password_new" class="form-control login-input mt-20"
                               placeholder="Enter new password" required>
                        <input type="password" name="password_new_1" id="password_new_1" class="form-control login-input mt-20"
                                   placeholder="Confirm new password" required>
                        <span class="error">New password & Confirm new password fields should be the same</span>
                        <button type="submit" class="modal-submit mt-20">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('button[type=submit]').on('click', function () {
                $('.error').removeClass('active');
                var passOld = $('#password_old').val();
                var passNew = $('#password_new').val();
                var passNew1 = $('#password_new_1').val();
                if (passNew == ''||passNew1 == ''||passOld == '') {
                    $('.error').text('Empty field(s)').addClass('active');
                    return false;
                }

                if (passNew !== passNew1) {
                    $('.error').text('New password & Confirm new password fields should be the same').addClass('active');
                    return false;
                } else {
                    return true;
                }
            });
        })
    </script>
@endsection
