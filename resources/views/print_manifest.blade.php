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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/floating-labels.css" rel="stylesheet">
    <link href="css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

</head>
<body>
<div class="container-fluid h-100">
    {{--@include('get_driver')--}}

    <div class="row justify-content-center align-items-center ">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center ">
                <div class="card-header"><h3>Shipping Manifest</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        @include('get_driver')
                    </p>

                </div>

                <div class="card-footer text-muted">
                    <a href="{{ route('additional') }}" class="btn btn-outline-primary btn-sm" role="button"
                       aria-pressed="true">Edit Components</a>
                    <p style="font-size: 75%;margin-top: 1em">Version 2</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.js"></script>
</body>
</html>