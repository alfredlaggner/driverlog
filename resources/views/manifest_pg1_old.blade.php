<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shipping Manifest</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Styles -->
    <style>

        .boxed {
            border: thin solid grey;
        }

        .left {
            margin-right: 30px;
        }

        h5 {
            margin-top: 20px;
        }

        .grey {
            background-color: lightgray;
        }

        .info {
            font-weight: bolder;
            color: black;
        }

        table {
            font-size: .8rem;
        }
/*
        table { table-layout: fixed; }
        td { width: 50%; }
*/
        th {font-weight: normal;text-transform: capitalize;
        }}
    </style>
</head>
<body>
<h3 class="text-center">SALES INVOICE / SHIPPING MANIFEST</h3>
{{-- line 1 --}}


<table style="table-layout: auto" class="table-sm table-bordered">
    <tr>
        <td  style="vertical-align:top; width: 90mm;"> @include('snippets.top_left_table')</td>
        <td style="vertical-align:top; width: 90mm;"> @include('snippets.top_right_table')</td>
    </tr>
</table>
<table  style="table-layout: auto;"  class="table-sm table-bordered">
    <tr>
        <td style="vertical-align:top; width:90mm;text-align:center">SHIPPER INFORMATION</td>
        <td style="vertical-align:top; width:90mm;text-align:center">RECEIVER INFORMATION</td>
    </tr>

</table>
<table  style="table-layout: auto;"  class="table-sm table-bordered">

    <tr>
        <td style="vertical-align:top; width: 90mm;">@include('snippets.shipper_table')</td>
        <td style="vertical-align:top; width: 90mm;">@include('snippets.receiver_table')</td>
    </tr>
</table>
<table  style="table-layout: auto;"  class="table-sm table-bordered">
    <tr>
        <td style="vertical-align:top;text-align:center; width:200mm;">DISTRIBUTOR INFORMATION</td>
    </tr>


    <table  style="table-layout: auto;"  class="table-sm table-bordered">

    <tr>
        <td style=" width:90mm;">@include('snippets.distributor_table')</td>
        <td style=" width:90mm;"> @include('snippets.driver_table')</td>
    </tr>
</table>
<table  style="table-layout: auto;"  class="table-sm table-bordered">

    <tr>
        <td style=" width:180mm;"> @include('snippets.product_table')</td>
    </tr>

</table>

{{--
<div class="container">
    <div class="row">
        <div class="col left">

        </div>
        <div class="col">
            @include('snippets.top_right_table')
        </div>
    </div>

    <div class="row">
        <div id='left' class="col">
            @include('snippets.shipper_table')
        </div>
        <div class="col">
            @include('snippets.receiver_table')
        </div>
    </div>


    <div class="row">
        <div class="col">
            <h5 class="text-center">DISTRIBUTOR INFORMATION</h5>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('snippets.distributor_table')
        </div>
        <div class="col">
            @include('snippets.driver_table')
        </div>

    </div>

    <div class="row">
        <div class="col">
            <h5 class="text-center">PRODUCT SHIPPED DETAILS</h5>
            <h6 class="text-center">RECEIVER COMPLETES ONLY THE SHADED COLUMNS BELOW</h6>
        </div>
    </div>

    @include('snippets.product_table')

    <div class="row">
        <div class="col">
            <h5 class="text-center">PRODUCT REJECTION</h5>
            <h6 class="text-center">IF PRODUCTS ARE REJECTED PLEASE CIRCLE THE ITEMS BEING REJECTED IN THE PRODUCT
                SHIPPED DETAILS SECTION ABOVE</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">

                <div class="col-2">
                    REASON FOR REJECTION
                </div>
                <div class="col-10">

                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col">
            <h5 class="text-center">PRODUCT RECEIPT CONFIRMATION</h5>
            <h6 class="text-center">I CONFIRM THAT THE CONTENTS OF THIS SHIPMENT MATCH IN WEIGHT AND COUNT AS INDICATED
                ABOVE. I AGREE TO TAKE CUSTODY OF ALL ITEMS AS INDICATED RECEIVED ABOVE - AND WHICH ARE NOT CIRCLED. THE
                PRODUCTS CIRCLED ABOVE ARE REJECTED FOR DELIVERY AND REMEIN IN THE CUSTODY OF THE DISTRIBUTOR FOR RETURN
                TO THE SHIPPER AS INDICATED ON THIS FORM AND ALL ATTACHED PRODUCT DETAIL SHEET(S). </h6>
        </div>
    </div>
    <div class="row">
        <div class="col-8">

            <div class="col-5">
                NAME OF THE PERSON RECEIVING AND/OR REJECTING PRODUCT
            </div>
            <div class="col-7">
            </div>
        </div>

        <div class="col-4">

            <div class="col-5">
                PHONE NUMBER
            </div>
            <div class="col-7">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">

            <div class="col-5">
                SIGNATURE OF THE PERSON RECEIVING AND/OR REJECTING PRODUCT
            </div>
            <div class="col-7">
            </div>
        </div>

        <div class="col-4">

            <div class="col-5">
                DATE SIGNED
            </div>
            <div class="col-7">
            </div>
        </div>
    </div>
</div>

--}}

</div>


</div>
</body>
</html>
