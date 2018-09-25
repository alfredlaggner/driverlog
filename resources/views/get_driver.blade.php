<body>
{!! Form::open(['route' => 'make_manifests','class' => 'form-signin']) !!}
<div class="form-label-group text-left">
    <label for="driverInput">Driver</label>
    <select id="driverInput" name="driver" class="custom-select" autofocus>
        @foreach ($drivers as $driver)
            @if ($driver->id == $old_vehicle)
                <option selected
                        value='{!! $driver->id!!}'>{!! $driver->first_name . ' ' . $driver->last_name!!}</option>
            @else
                <option value='{!! $driver->id!!}'>{!! $driver->first_name . ' ' . $driver->last_name!!}</option>
            @endif
        @endforeach
    </select>
</div>
{{--//{!! Form::select('user', [-1 => 'All'] + $users , Session::get('filter.user')) !!}--}}
<div class="form-label-group text-left">
    @php
            @endphp
    <label for="inputVehicle">Vehicle</label>
    <select id="vehicleInput" name="vehicle" class="custom-select" required>
        @foreach ($vehicles as $vehicle)
            @if ($vehicle->id == $old_vehicle)
                <option selected
                        value='{!! $vehicle->id!!}'>{!! $vehicle->make . ' ' . $vehicle->model . ' - ' .  $vehicle->plate !!}</option>
            @else
                <option value='{!! $vehicle->id!!}'>{!! $vehicle->make . ' ' . $vehicle->model . ' - ' .  $vehicle->plate !!}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-label-group text-left">
    @php
            @endphp
    <label for="inputVehicle">Sale Order</label>
    <!-- Large input -->
    <input class="form-control form-control-lg" name = "sale_orders" type="text" placeholder="Sale order number">
    </select>
</div>

<div class="form-label-group text-left">
    <label for="printLable">&nbsp;</label>

    <button id="printLable" class="btn btn-lg btn-primary btn-block" type="submit">Print Manifest</button>
</div>

{!! Form::close() !!}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
<script>
    var $TABLE = $('#table');
    var $BTN = $('#export-btn');
    var $EXPORT = $('#export');

    $('.table-add').click(function () {
        var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
        $TABLE.find('table').append($clone);
    });

    $('.table-remove').click(function () {
        $(this).parents('tr').detach();
    });

    $('.table-up').click(function () {
        var $row = $(this).parents('tr');
        if ($row.index() === 1) return; // Don't go above the header
        $row.prev().before($row.get(0));
    });

    $('.table-down').click(function () {
        var $row = $(this).parents('tr');
        $row.next().after($row.get(0));
    });

    // A few jQuery helpers for exporting only
    jQuery.fn.pop = [].pop;
    jQuery.fn.shift = [].shift;

    $BTN.click(function () {
        var $rows = $TABLE.find('tr:not(:hidden)');
        var headers = [];
        var data = [];

// Get the headers (add special header logic here)
        $($rows.shift()).find('th:not(:empty)').each(function () {
            headers.push($(this).text().toLowerCase());
        });

// Turn all existing rows into a loopable array
        $rows.each(function () {
            var $td = $(this).find('td');
            var h = {};

// Use the headers from earlier to name our hash keys
            headers.forEach(function (header, i) {
                h[header] = $td.eq(i).text();
            });

            data.push(h);
        });

// Output the result
        $EXPORT.text(JSON.stringify(data));
    });
</script>
</html>


{{--

    {!! Form::open(['route' => 'make_manifest']) !!}
    {!!Form::label('driver', 'Driver')  !!}
    <select id='driver' name='driver'>
        @foreach ($drivers as $driver)
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
