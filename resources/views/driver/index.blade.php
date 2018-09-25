<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>All Drivers</title>
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
        <th>First Name</th>
        <th>Last Name</th>
        <th>Driver License</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

@foreach($drivers as $driver)
    @php
        @endphp

        <tr>
            <td>{{$driver['first_name']}}</td>
            <td>{{$driver['last_name']}}</td>
            <td>{{$driver['license']}}</td>

        <td><a href="{{action('DriverController@edit', $driver['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('DriverController@destroy', $driver['id'])}}" method="post">
    @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
@endforeach
    </tbody>
  </table>
      <form action="{{action('DriverController@create')}}" method="get">
        @csrf
        <input name="_method" type="hidden" value="CREATE">
        <button class="btn btn-primary" type="submit">Add Driver</button>
          <a href="{{ route('go-home') }}" class="btn btn-outline-primary btn-sm" role="button"
             aria-pressed="true">Home</a>
    </form>

    </div>
  </body>
</html>