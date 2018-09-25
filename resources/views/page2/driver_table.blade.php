
<table class="table table-bordered">
    <tbody>
    <tr>
        <th>DRIVER'S NAME</th>
        <td>{{ $driver->first_name }} {{ $driver->last_name }}</td>
    </tr>
    <tr>
        <th> CA DRVR LIC #</th>
        <td>{{ $driver->license }}</td>
    </tr>
    <tr>
        <th>VEHICLE MAKE</th>
        <td>{{ $vehicle->make }}</td>
    </tr>
    <tr>
        <th>VEHICLE MODEL</th>
        <td>{{ $vehicle->model }}</td>
    </tr>
    <tr>
        <th>VEHICLE LIC. PLATE #</th>
        <td>{{ $vehicle->plate }}</td>
    </tr>
    <tr>
        <th>ACTUAL DATE AND TIME OF ARRIVAL</th>
        <td></td>
    </tr>
    </tbody>
</table>
