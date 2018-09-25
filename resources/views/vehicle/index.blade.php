<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>All Vehicles</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Make</th>
        <th>Plate</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

@foreach($vehicles as $vehicle)
    @php
        @endphp

        <tr>
            <td>{{$vehicle['id']}}</td>
            <td>{{$vehicle['make']}}</td>
            <td>{{$vehicle['model']}}</td>
            <td>{{$vehicle['plate']}}</td>

        <td><a href="{{action('VehicleController@edit', $vehicle['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('VehicleController@destroy', $vehicle['id'])}}" method="post">
    @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
@endforeach
    </tbody>
  </table>
      <form action="{{action('VehicleController@create')}}" method="get">
        @csrf
        <input name="_method" type="hidden" value="CREATE">
        <button class="btn btn-primary" type="submit">Add Vehicle</button>
          <a href="{{ route('go-home') }}" class="btn btn-outline-primary btn-sm" role="button"
             aria-pressed="true">Home</a>
    </form>

    </div>
  </body>
</html>