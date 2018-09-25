<html lang="en">
<head>
    <title>Manifest Pring</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">Print Manifest </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{ route('excel-file',['type'=>'xls']) }}">Download Excel xls</a> |
            </div>
        </div>
        {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
                    <div class="col-md-9">
                        {!! Form::file('sample_file', array('class' => 'form-control')) !!}
                        {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                {!! Form::submit('Upload',['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</body>
</html>