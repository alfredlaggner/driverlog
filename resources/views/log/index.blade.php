@extends('layouts.app')
@section('title', 'Driver Logs')
@section('content')
    <div class="container">
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
                <th>Scheduled</th>
                <th>Customer</th>
                <th>SalesPerson</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                //  dd($logs);
            @endphp
            @foreach($logs as $log)
                @php
                @endphp

                <tr>
                    <td>{{$log->id}}</td>
                    <td>SO{{$log->saleinvoice_id}}</td>
                    <td>{{$log->delivery_date}}</td>
                    <td>{{$log->customer->name}}</td>
                    <td>{{$log->salesperson->name}}</td>
                    {{--
                                    <td>{{$log->saleinvoices->invoice_id}}</td>
                    --}}

                    <td><a href="{{route('edit_action', $log->saleinvoice_id)}}" class="btn btn-warning">Deliver</a>
                    </td>
                    <td>
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
    </div>
@endsection
