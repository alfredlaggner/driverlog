<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shipping Manifest</title>
</head>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<!-- Styles -->
<style>

    h5 {
        margin-top: 20px;
    }

    body {
        /*
                    font-size: 1em
        */
    }

    th {
        font-weight: normal;
    }

    .table td, .table th {
        font-size: 15px;
        padding: 0;
        vertical-align: center;
    }

    @page {
        margin: 0px;
    }

    body {
        margin: 0px;
    }

</style>

<body>
<div class="container-fluid">
    <h5 class="text-center">SALES INVOICE / SHIPPING MANIFEST</h5>
    {{-- line 1 --}}


    <table style="table-layout: auto;" class="table_sm table-bordered">
        <tr>
            <td style="vertical-align:top; width: 90mm;"> @include('page1.top_left_table')</td>
            <td style="vertical-align:top; width: 90mm;"> @include('page1.top_right_table')</td>
        </tr>
    </table>
    <table style="table-layout: auto; width: 100%" class="table-bordered">
        <tr>
            <td style="vertical-align:top; width:90mm;text-align:center">SHIPPER INFORMATION</td>
            <td style="vertical-align:top; width:90mm;text-align:center">RECEIVER INFORMATION</td>
        </tr>

    </table>
    <table style="table-layout: auto; width: 100%" class="table table-bordered">

        <tr>
            <td style="vertical-align:top; width: 90mm;">@include('page1.shipper_table')</td>
            <td style="vertical-align:top; width: 90mm;">@include('page1.receiver_table')</td>
        </tr>
    </table>
    <table style="table-layout: auto;width:100%;" class="table table-bordered">
        <tr>
            <td style="text-align:center; ">DISTRIBUTOR INFORMATION</td>
        </tr>
    </table>

    <table style="table-layout: auto; width: 100%" class="table table-bordered">

        <tr>
            <td style=" width:90mm;">@include('page1.distributor_table')</td>
            <td style=" width:90mm;"> @include('page1.driver_table')</td>
        </tr>
    </table>
    <table style="table-layout: auto; width:100%" class="table table-bordered">
        <tr>
            <td style="text-align:center;">PRODUCT SHIPPED DETAILS</td>
        </tr>
        <tr>
            <td style="text-align:center;">RECEIVER COMPLETES ONLY THE SHADED COLUMNS BELOW</td>
        </tr>
    </table>

