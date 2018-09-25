@extends('layouts.app')
@section('title', 'Driver Logs')
@section('content')

    <br/>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br/>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Salesorder</th>
            <th>Customer</th>
            <th>SalesPerson</th>
            <th>Complaint</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($logs as $log)
            @php
                //          dd($log->driver->first_name);
            @endphp

            <tr>
                <td>{{$log->id}}</td>
{{--
                <td>{{$log->saleinvoices->invoice_id}}</td>
--}}

                <td><a href="{{action('DriverLogController@edit', $log['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('DriverLogController@destroy', $log['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form action="{{action('DriverLogController@create')}}" method="get">
        @csrf
        <input name="_method" type="hidden" value="CREATE">
        <button class="btn btn-primary" type="submit">Add Log</button>
        <a href="{{ route('go-home') }}" class="btn btn-outline-primary btn-sm" role="button"
           aria-pressed="true">Home</a>
    </form>
@endsection
