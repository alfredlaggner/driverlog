
{{--<table class="table table-bordered"  style="width: 100%">--}}
    {{--<tbody>--}}
    {{--<tr>--}}
        {{--<th>STATE LICENSE #</th>--}}
        {{--<td>{{ $invoice->customer->license }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th>TYPE OF LICENSE</th>--}}
        {{--<td>Retailer License</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th> BUSINESS NAME</th>--}}
        {{--<td>{{ $invoice->customer->name }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th>BUSINESS ADDRESS</th>--}}
        {{--<td>{{ $invoice->customer->street }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th> CITY, STATE, ZIP CODE</th>--}}
        {{--<td>{{  $invoice->customer->city }}, CA {{  $invoice->customer->zip }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th>PHONE NUMBER</th>--}}
        {{--<td>{{ $invoice->customer->phone }}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<th>CONTACT NAME</th>--}}
        {{--<td>{{''}}</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
{{--</table>--}}

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

    <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Driver</label>

                <div class="col-sm-6">
                    <input type="select" name="driver" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Select a driver
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
@endsection