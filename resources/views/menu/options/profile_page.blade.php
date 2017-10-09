@extends('menu.menu_body')

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
        <a href="#" class="modal-executer" data-modal="gpsModal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">GPS</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="gpsModalValue" class="driver-name font-thin">{{$driver['last_lat']}}&nbsp;{{$driver['last_lng']}}</h3>
                </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer" data-modal="addressModal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Address</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="addressModalValue" class="driver-name font-thin">{{$driver['address']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer" data-modal="cityModal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">City</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="cityModalValue" class="driver-name font-thin">{{$driver['address']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer" data-modal="licenseModal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">License #</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="licenseModalValue" class="driver-name font-thin">{{$driver['driver_license_number']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer" data-modal="phoneModal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Company Provided)</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="phoneModalValue" class="driver-name font-thin">{{$driver['phone']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!-----------------------------------------> <!----------------------------------------->
        <a href="#" class="modal-executer" data-modal="mobile1Modal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Personal 1)</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="mobile1ModalValue" class="driver-name font-thin">{{$driver['mobile_1']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!-----------------------------------------> <!----------------------------------------->
        <a href="#" class="modal-executer" data-modal="mobile2Modal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Mobile (Personal 2)</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="mobile2ModalValue" class="driver-name font-thin">{{$driver['mobile_2']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#" class="modal-executer" data-modal="emailModal">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Email</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h3 id="emailModalValue" class="driver-name font-thin">{{$driver['email']}}</h3>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><i class="fa fa-arrow-right pull-right next"></i>
                </div>
            </div>
        </a>
        <!----------------------------------------->
        <!----------------------------------------->
        <a href="#">
            <div class="row white">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">Activation</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h3 class="driver-name font-thin">{{$driver['updated_at']}}</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input id="activateProfile" type="checkbox" data-id="{{$driver['_id']}}" class="pull-right">
                    <h3 class="driver-name pull-right red"><label for="activateProfile"> Deactive</label></h3>
                </div>
            </div>
        </a>
        <!----------------------------------------->

    </div>

    {{------------ gps Modal Window --------------------}}
    <div id="gpsModal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="status text-center">GPS</h1>
                </div>
            </div>

            <div class="row">
                <form id="gpsModalForm" class="container" method="POST" action="{{route('post_send_message')}}">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{ csrf_field() }}
                    <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                    <input type="hidden" name="param_name"  value="gps_coords">
                    <textarea placeholder="GPS coordinates" name="param_value" class="modal-text-area" id="gpsModalData"></textarea>
                    <input type="submit" class="modal-submit" data-modal="gpsModal" value="Request For Change">
                </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of gps Modal Window -------------}}

    {{------------ address Modal Window --------------------}}
    <div id="addressModal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Address</h1>
                </div>
            </div>

            <div class="row">
                <form id="addressModalForm" class="container" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="address">
                        <textarea name="" placeholder="Address" class="modal-text-area" id="addressModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="addressModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of address Modal Window -------------}}

    {{------------ city Modal Window --------------------}}
    <div id="cityModal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">City</h1>
                </div>
            </div>

            <div class="row">
                <form id="cityModalForm" class="container" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="city">
                        <textarea placeholder="City" class="modal-text-area" id="cityModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="cityModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of city Modal Window -------------}}

    {{------------ license Modal Window --------------------}}
    <div id="licenseModal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">License #</h1>
                </div>
            </div>

            <div class="row">
                <form id="licenseModalForm" class="container" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="driver_license_number">
                        <textarea placeholder="License number" class="modal-text-area" id="licenseModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="licenseModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of license Modal Window -------------}}

    {{------------ phone Modal Window --------------------}}
    <div id="phoneModal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Mobile (Company provided)</h1>
                </div>
            </div>

            <div class="row">
                <form id="phoneModalForm" class="container" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="phone">
                        <textarea placeholder="Phone number(Company provided)" class="modal-text-area" id="phoneModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="phoneModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of phone Modal Window -------------}}

    {{------------ mobile1 Modal Window --------------------}}
    <div id="mobile1Modal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Mobile (Personal 1)</h1>
                </div>
            </div>

            <div class="row">
                <form id="mobile1ModalForm" class="container" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="mobile_1">
                        <textarea placeholder="Phone number (Personal 1)" class="modal-text-area" id="mobile1ModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="mobile1Modal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of mobile1 Modal Window -------------}}

    {{------------ mobile2 Modal Window --------------------}}
    <div id="mobile2Modal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Mobile (Personal 2)</h1>
                </div>
            </div>

            <div class="row">
                <form id="Phone number (Personal 1)" class="container" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="mobile_2">
                        <textarea placeholder="GPS coordinates" class="modal-text-area" id="mobile2ModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="mobile2Modal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of mobile2 Modal Window -------------}}

    {{------------ email Modal Window --------------------}}
    <div id="emailModal" class="modal-container">
        <div class="container">
            <div class="white">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h1 class="status text-center">Email</h1>
                </div>
            </div>

            <div class="row">
                <form id="emailModalForm" class="container" method="POST" action="{{route('post_send_message')}}">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ csrf_field() }}
                        <input type="hidden" name="driver_id" value="{{$driver['_id']}}">
                        <input type="hidden" name="param_name"  value="email">
                        <textarea placeholder="GPS coordinates" class="modal-text-area" id="emailModalData"></textarea>
                        <input type="submit" class="modal-submit" data-modal="emailModal" value="Request For Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{------------ end of email Modal Window -------------}}





@endsection

@section('options_scripts')
    <script>
        $(document).ready(function () {
            $('input[type="checkbox"]').on('click', function (e) {
                var id = $(this).data('id');
                var data ={};
                var isChecked = $(this).is(":checked");
                console.log(id);
                if (isChecked)
                {
                    data = {id: id, activated: true};
                } else {
                    data = {id: id, activated: false};
                }

                $.ajax({
                    url: "#",
                    method: 'post',
                    data: data
                }).done(function() {
                    if (isChecked) {
                        $( this ).siblings('driver-name').addClass('red').text('Deactivate');
                        $( this ).siblings('driver-name').removeClass('green').text('Activate');
                    } else {
                        $( this ).siblings('driver-name').addClass('green').text('Activate');
                        $( this ).siblings('driver-name').removeClass('red').text('Deactivate');
                    }

                });

            });

            //show Modal Window
            $(document).on('click', 'a.modal-executer', function () {
                var modId = $(this).data('modal');
                var modValue = $(this).find($('#'+modId+'Value')).text();
                var modal = $('#'+modId);
                modal.find('textarea').val(modValue);
                modal.addClass('active');
            });



        })
    </script>
@endsection