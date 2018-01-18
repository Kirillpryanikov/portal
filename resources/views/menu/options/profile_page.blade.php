@extends('menu.menu_body')

@section('menu-page-title', 'Profile')

@section('menu_options')
    <div class="container">
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu', $driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Profile</p>
            </div>
        </div>
    </div>

    <div class="container">
        <!----------------------------------------->
        <div class="row white">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-1 bg-white">
                <h1 class="status text-center">Settings</h1>
            </div>
        </div>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer not-away " data-modal="gpsModal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">GPS</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="gpsModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['last_lat']))?$driver['last_lat']:''}}, {{(isset($driver['last_lng']))?$driver['last_lng']:''}}</h3>
                </div>
                    <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="addressModal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Address</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="addressModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['address']))?$driver['address']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="cityModal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">City</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="cityModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['city_data']))?$driver['city_data']['name']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="licenseModal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">License #</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="licenseModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['driver_license_number']))?$driver['driver_license_number']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="phoneModal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Company Provided)</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="phoneModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['phone']))?$driver['phone']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!-----------------------------------------> <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="mobile1Modal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Personal 1)</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="mobile1ModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['mobile_1']))?$driver['mobile_1']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!-----------------------------------------> <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="mobile2Modal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Personal 2)</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="mobile2ModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['mobile_2']))?$driver['mobile_2']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="emailModal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Email</h3>
                </div>
                <div class="col-7 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="emailModalValue" class="ps-15 driver-name font-thin">{{(isset($driver['email']))?$driver['email']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer not-away" data-modal="activationModal">
            <div class="row white">
                <div class="col-3 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Activation</h3>
                </div>
                <div class="col-7 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="ps-15 driver-name font-thin">{{(isset($driver['updated_at']))?$driver['updated_at']:''}}</h3>
                </div>
                <div class="text-right col-2 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    @if((isset($driver['status']))&&($driver['status']=='active'))
                        <h3 class="driver-name pull-right green"><label for="activateProfile"> Active</label></h3>
                    @else
                        <h3 class="driver-name pull-right red"><label for="activateProfile"> Inactive</label></h3>
                    @endif
                </div>
            </div>
        </a>
        <!----------------------------------------->

    </div>

    {{------------ gps Modal Window --------------------}}
    <div id="gpsModal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="status text-center">GPS</h1>
                </div>
            </div>

            <div class="row">
                <form id="gpsModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{ csrf_field() }}
                    <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                    <input type="hidden" name="param_name"  value="address_coordinates">
                    <textarea placeholder="GPS coordinates" name="param_value" class="modal-text-area" id="gpsModalData"></textarea>
                    <input type="submit" class="modal-submit" data-modal="gpsModal" value="Request For Change">
                </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="gpsModal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of gps Modal Window -------------}}

    {{------------ address Modal Window --------------------}}
    <div id="addressModal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Address</h1>
                </div>
            </div>

            <div class="row">
                <form id="addressModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="address">
                        <textarea  name="param_value" placeholder="Address" class="modal-text-area" id="addressModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="addressModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="addressModal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of address Modal Window -------------}}

    {{------------ city Modal Window --------------------}}
    <div id="cityModal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">City</h1>
                </div>
            </div>

            <div class="row">
                <form id="cityModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="city">
                        <textarea placeholder="City" name="param_value" class="modal-text-area" id="cityModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="cityModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="cityModal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of city Modal Window -------------}}

    {{------------ license Modal Window --------------------}}
    <div id="licenseModal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">License #</h1>
                </div>
            </div>

            <div class="row">
                <form id="licenseModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="driver_license_number">
                        <textarea placeholder="License number" name="param_value" class="modal-text-area" id="licenseModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="licenseModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="licenseModal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of license Modal Window -------------}}

    {{------------ phone Modal Window --------------------}}
    <div id="phoneModal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Mobile (Company provided)</h1>
                </div>
            </div>

            <div class="row">
                <form id="phoneModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="phone">
                        <textarea placeholder="Phone number(Company provided)" name="param_value" class="modal-text-area" id="phoneModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="phoneModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="phoneModal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of phone Modal Window -------------}}

    {{------------ mobile1 Modal Window --------------------}}
    <div id="mobile1Modal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Mobile (Personal 1)</h1>
                </div>
            </div>

            <div class="row">
                <form id="mobile1ModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="mobile_1">
                        <textarea placeholder="Phone number (Personal 1)" name="param_value" class="modal-text-area" id="mobile1ModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="mobile1Modal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="mobile1Modal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of mobile1 Modal Window -------------}}

    {{------------ mobile2 Modal Window --------------------}}
    <div id="mobile2Modal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Mobile (Personal 2)</h1>
                </div>
            </div>

            <div class="row">
                <form id="mobile2ModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="mobile_2">
                        <textarea placeholder="Phone number (Personal 2)" name="param_value" class="modal-text-area" id="mobile2ModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="mobile2Modal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="mobile2Modal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of mobile2 Modal Window -------------}}

    {{------------ email Modal Window --------------------}}
    <div id="emailModal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Email</h1>
                </div>
            </div>

            <div class="row">
                <form id="emailModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="email">
                        <textarea placeholder="Enter Email" name="param_value" class="modal-text-area" id="emailModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="emailModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="emailModal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of email Modal Window -------------}}

    {{------------ activation Modal Window --------------------}}
    <div id="activationModal" class="modal-container col-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4">
        <div class="full-width">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Activation</h1>
                </div>
            </div>

            <div class="row">
                <form id="activationModalForm" class="full-width" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="status">
                        <textarea placeholder="Enter your message" name="param_value" class="modal-text-area" id="activationModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="activationModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-close" data-close="activationModal"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></div>
    </div>
    {{------------ end of activation Modal Window -------------}}





@endsection

@section('options_scripts')
    <script>
        $(document).ready(function () {

            //show Modal Window
            $(document).on('click', 'a.modal-executer', function () {
                var modId = $(this).data('modal');
                var modValue = $(this).find($('#'+modId+'Value')).text();
                var modal = $('#'+modId);
                modal.find('textarea').val(modValue);
                modal.addClass('active');
            });

            //hide Modal Window
            $(document).on('click', '.modal-close', function () {
                var modId = $(this).data('close');
                var modal = $('#'+modId);
                modal.removeClass('active');
            });

        })
    </script>
@endsection