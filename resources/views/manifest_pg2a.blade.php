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
            vertical-align: bottom;
        }

        /*        td, th {
        height: 30px;
            margin:0;
            padding:0;
          padding-top: 10px;
        }*/
        td,th
        {
            font-size: 16px;
            padding: .1rem;
            vertical-align: center;
            border-top: 1px solid #dee2e6;
        }
        @page { margin: 0px; }
        body { margin: 0px; }

    </style>
</head>
<body>
<div class="container-fluid">
    <h5 class="text-center">SALES INVOICE / SHIPPING MANIFEST</h5>
    <p class="text-center">Product Details attachment page</p>
    {{-- line 1 --}}


    <table style="table-layout: auto;" class="table_sm table-bordered">
        <tr>
            <td style="vertical-align:top; width: 90mm;"> @include('page2.top_left_table')</td>
            <td style="vertical-align:top; width: 90mm;"> @include('page2.top_right_table')</td>
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

    <table style="width: 100%" class="table">
        <tr>
            <td style=""> @include('page2.product_table')</td>
        </tr>
    </table>
    <table style="table-layout: auto; width:100%" class="table table-bordered">
        <tr>
            <td style="text-align:center;width: 100%">PRODUCT REJECTION</td>
        </tr>
        <tr>
            <td class="text-center">IF PRODUCTS ARE REJECTED PLEASE CIRCLE THE ITEMS BEING REJECTED IN THE PRODUCT
                SHIPPED DETAILS SECTION ABOVE
            </td>
        </tr>
    </table>
    <table style="table-layout: auto; width:100%" class="table table-bordered">
        <tr>
            <td style=" width: 25%">REASON FOR RECECTION</td>
            <td style=" width: 100%"></td>
        </tr>
    </table>
    <table style="table-layout: auto; width:100%" class="table table-bordered">
        <tr>
            <td style="text-align:center;width: 100%">PRODUCT RECEIPT CONFIRMATION</td>
        </tr>
        <tr>
            <td class="text-left">I confirm that the contents of this shipment match in weight and count as indicated above.<br>
            I agree to take custody of all items as inicated received above - and which are not circled. <br>
            The products circled abbove are rejected for delivery and remain in the custody of the distributor for return to the shipper as indicated in this form and all attached product detail sheet(s).
        </tr>
    </table>
    <table style="table-layout: auto; width:100%" class="table table-bordered">
        <tr>
            <td style= "width: 30%">NAME OF PERSON RECEIVING AND/OR REJECTIONG PRODUCT</td>
            <td style="width: 40%"></td>
            <td style= "width: 10%"> PHONE NUMBER</td>
            <td style="width: 20%"></td>
        </tr>
        <tr>
            <td style= "width: 30%">SIGNATURE OF PERSON RECEIVING AND/OR REJECTING PRODUCT</td>
            <td style="width: 40%"></td>
            <td style= "width: 10%"> DATE SIGNED</td>
            <td style="width: 20%"></td>
        </tr>
    </table>
    <div>
        {{--
        <div class="container">
            <div class="row">
                <div class="col left">

                </div>
                <div class="col">
                    @include('page1.top_right_table')
                </div>
            </div>

            <div class="row">
                <div id='left' class="col">
                    @include('page1.shipper_table')
                </div>
                <div class="col">
                    @include('page1.receiver_table')
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <h5 class="text-center">DISTRIBUTOR INFORMATION</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @include('page1.distributor_table')
                </div>
                <div class="col">
                    @include('page1.driver_table')
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <h5 class="text-center">PRODUCT SHIPPED DETAILS</h5>
                    <h6 class="text-center">RECEIVER COMPLETES ONLY THE SHADED COLUMNS BELOW</h6>
                </div>
            </div>

            @include('page1.product_table')

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
