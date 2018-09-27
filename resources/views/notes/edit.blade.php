<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Notes </title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
  <h2>Edit note</h2><br  />
  <form method="post" action="{{action('NotesController@update', $id)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="make">note:</label>
        <input type="text" class="form-control" name="note" value="{{$note->note}}">
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