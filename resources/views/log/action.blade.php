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
            <div class="card" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">{{$log->customer->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$log->customer->license}}</h6>
                    <div class="mt-3">
                        <p class="card-text"><b>Salesperson:</b> {{$log->salesperson->name}} <b>Email:</b> {{$log->salesperson->email}}</p>
                        <p class="card-text"><b>Driver:</b> {{$log->driver->first_name}} {{$log->driver->last_name}}</p>
                        <p class="card-text"><b>Vehicle:</b> {{$log->vehicle->plate}}</p>
                        <a href="#" class="btn btn-sm btn-primary">Notes</a>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="mb-3"> <b>SO{{$log->saleinvoice_id}}</b></h5>
                        <table class="table table-sm table-responsive" width="100%" id="sales_order_table">
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
                                    <td><a href="{{action('DriverController@edit', $salesorder->id)}}"
                                           class="btn btn-warning">Edit</a></td>
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
