<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Vehicle </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>New Log</h2><br/>
    <form method="post" action="{{action('DriverLogController@store')}}">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="make">Driver:</label>
                <select class="form-control" name="driver_id">
                    @foreach($drivers as $driver)
                        <option value="{{$driver->id}}"> {{$driver->first_name}} {{$driver->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <button type="submit" class="btn btn-success" style="margin-left:38px">Create</button>
                <a href="{{ route('go-home') }}" class="btn btn-outline-primary btn-sm" role="button"
                   aria-pressed="true">Home</a>

            </div>
        </div>
    </form>
</div>
</body>
</html>