<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Driver </title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
  <h2>New Driver</h2><br  />
  <form method="post" action="{{action('DriverController@store')}}">
    @csrf
{{--
    <input name="_method" type="hidden" value="PATCH">
--}}
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" name="first_name" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="license">License:</label>
        <input type="text" class="form-control" name="license" value="">
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