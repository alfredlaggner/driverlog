<body>
{{--
<form action="{{action('DriverController')}}" method="get">
    @csrf
    <input name="_method" type="hidden" value="CREATE">
    <button class="btn btn-primary" type="submit">Add Driver</button>
</form>
<form action="{{action('VehicleController')}}" method="get">
    @csrf
    <input name="_method" type="hidden" value="CREATE">
    <button class="btn btn-primary" type="submit">Add Vehicle</button>
</form>
--}}
<a href="{{ route('driver-edit') }}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Drivers</a>
<a href="{{ route('vehicle-edit') }}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Vehicles</a>
<a href="{{ route('note-edit') }}" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Notes</a>

</body>
</html>


{{--

    {!! Form::open(['route' => 'make_manifest']) !!}
    {!!Form::label('driver', 'Driver')  !!}
    <select id='driver' name='driver'>
        @foreach ($driver as $driver)
            <option value='{!! $driver->id!!}'>{!! $driver->first_name . ' ' . $driver->last_name!!}</option>
        @endforeach

    </select>
    <select id='vehicle' name='vehicle'>
        @foreach ($vehicles as $vehicle)
            <option value='{!! $vehicle->id!!}'>{!! $vehicle->plate . ' ' . $vehicle->make !!}</option>
        @endforeach

    </select>
    {!! Form::submit('Click Me!') !!}
    {!! Form::close() !!}
--}}
