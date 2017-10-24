@extends('layouts.base')

@section('content')
    <div class="container mt-10vh">
        <h3>Email Template</h3>
    </div>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="formGroupExampleInput">Subject</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
            </div>
            <div class="form-group mt-45">
                <label for="formGroupExampleInput2">Label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Current Value</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">New Value</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
            </div>
            <div class="form-group mt-45">
                <label for="formGroupExampleInput">To:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">From:</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
            </div>
        </form>
    </div>
@endsection