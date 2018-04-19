@extends('menu.menu_body')

@section('menu-page-title', 'Statements')

@section('menu_options')
    {{--<div class="container">--}}
        {{--<div class="row white">--}}
            {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                {{--<p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a></p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{----}}
    {{--<div class="container">--}}
{{----}}

        <div class="container" style="padding: 30px 0px;">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('status') }}
                </div>
            @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif
            <h4>Statments</h4>
            <table class="table">

                <tbody>
                @foreach($uploaded_files['datas'] as $item)
                <tr>
                    <td><a href="/show_file/{{$item['id']}}">{{$item['file_name']}}</a></td>
                    <td>{{$item['created_at']}}</td>
                    <td>
                        <a style="text-transform: capitalize;font-weight: bold;color: #5f5f5f;" href="{{url('/get_file/'.$item['id'])}}">Download</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
                <div class="container d-flex justify-content-center mt-3 mb-3">
                    <nav id="statetmentPagination" data-pages="{{$uploaded_files['allPage']}}" data-current="{{$uploaded_files['page']}}"></nav>
                </div>
        </div>

@endsection

@section('options_scripts')
    <script src="{{asset('js/bootpag/bootpag.min.js')}}"></script>
    <script src="{{asset('js/bootpag/bootpag-init.js')}}"></script>
    <script>
        $(document).ready(function () {
            var totalPages = parseInt($('#statetmentPagination').data('pages'));
            var currentPage = parseInt($('#statetmentPagination').data('current'));
            var nav = $('#statetmentPagination');

            if (totalPages > 1) {
                bootpagInit(nav, '/get_files/', currentPage, totalPages)
            }
        })
    </script>
@endsection