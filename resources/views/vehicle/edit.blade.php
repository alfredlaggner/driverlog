<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Drivers </title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
  <h2>Edit Driver</h2><br  />
  <form method="post" action="{{action('VehicleController@update', $id)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="make">Meke:</label>
        <input type="text" class="form-control" name="make" value="{{$vehicle->make}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="model">Model:</label>
        <input type="text" class="form-control" name="model" value="{{$vehicle->model}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="plate">Plate:</label>
        <input type="text" class="form-control" name="plate" value="{{$vehicle->plate}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4" style="margin-top:60px">
        <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
        <a href="{{ route('go-home') }}" class="btn btn-outline-primary btn-sm" role="button"
           aria-pressed="true">Home</a>

      </div>
    </div>
  </form>
</div>
</body>
</html>