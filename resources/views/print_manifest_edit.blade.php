<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Printing Manifest</title>

    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/floating-labels.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid h-100">
    {{--@include('get_driver')--}}

    <div class="row justify-content-center align-items-center ">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center ">
                <div class="card-header"><h3>Edit Components</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        @include('get_manifest_additional')
                    </p>

                </div>
                <div class="card-footer text-muted">
{{--
                    <p class="text-muted text-center">&copy; Oz Distribution, Inc. 2017-2018</p>
--}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>