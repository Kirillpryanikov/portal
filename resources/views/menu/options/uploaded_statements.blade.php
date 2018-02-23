@extends('menu.menu_body')

@section('menu-page-title', 'Statements')

@section('menu_options')
    {{--<div class="container">--}}
        {{--<div class="row white">--}}
            {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                {{--<p class="breadcrumb"><a href="{{route('menu')}}">Drivers Names</a> &gt; <a href="{{route('personal_menu',$driver['_id'])}}">{{$driver['full_name']}}</a> &gt; Statements</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{----}}
    {{--<div class="container">--}}
{{----}}

        <div class="container-fluid">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>File Name</th>
                    <th>Contain rows</th>
                    <th>Date upload</th>
                    <th>Download</th>
                </tr>
                </thead>
                <tbody>
                @foreach($uploaded_files as $item)
                <tr>
                    <td><a href="{{url('/show_file/'.$item->id)}}">{{$item->id}}</a></td>
                    <td>{{$item->file_name}}</td>
                    <td>{{$item->uploaded_statements_count}}</td>
                    <td>{{$item->created_at}}</td>
                    <td><a href="{{url('/get_file/'.$item->id)}}">save</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@endsection

@section('options_scripts')

@endsection