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
  <h2>New Vehicle</h2><br  />
  <form method="post" action="{{action('VehicleController@store')}}">
    @csrf
{{--
    <input name="_method" type="hidden" value="PATCH">
--}}
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="make">Make:</label>
        <input type="text" class="form-control" name="make" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="model">Model:</label>
        <input type="text" class="form-control" name="model" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="plate">Plate:</label>
        <input type="text" class="form-control" name="plate" value="">
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