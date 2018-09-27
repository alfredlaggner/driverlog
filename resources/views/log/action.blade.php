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
        @foreach($logs as $log)
            <div class="card" style="width: 40rem;">
                <div class="card-body">
                    <h5 class="card-title">SO{{$log->saleinvoice_id}}</h5>
                    <p class="card-text">
                    <p>Customer: {{$log->customer->name}}</p>
                    <p>Salesperson: {{$log->salesperson->name}} Email: {{$log->salesperson->email}}</p>
                    <p>Driver: {{$log->driver->first_name}} {{$log->driver->last_name}}</p>
                    <p>Vehicle: {{$log->vehicle->plate}}</p>
                    <a href="#" class="btn btn-sm btn-primary">Notes</a>
                    <hr>
                    <div class="table-responsive">
                        <caption>Products to deliver</caption>
                        <table class="table table-sm" id="sales_order_table">
                            <thead>
                            <tr>
                                <th scope="col">Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            @foreach ($log->order_lines as $salesorder)
                                @php
                                $total_price = $salesorder->quantity * $salesorder->unit_price;
                                @endphp
                                <tr>
                                    <td>{{$salesorder->code}}</td>
                                    <td>{{$salesorder->name}}</td>
                                    <td>{{$salesorder->quantity}}</td>
                                    <td>${{$total_price}}</td>
                                    <td><a href="{{action('DriverController@edit', $salesorder->id)}}" class="btn btn-warning">Edit</a></td>
                                </tr>
                                @endforeach
                                </tbody>

                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
