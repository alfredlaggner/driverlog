<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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


    </style>
</head>
<body>
<div class="container">
    <h3 class="text-center">SALES INVOICE / SHIPPING MANIFEST</h3>
    {{-- line 1 --}}
    <div class="row">
        <div class="col left">
            <div class="row ">
                <div class="col-5  border-right">
                    INVOICE/MANIFEST #
                </div>
                <div class="col-7">
                    &nbsp;
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row ">
                <div class="col-6 border-right">
                    ACTUAL DATE AND TIME AND TIME OF DEPARTURE
                </div>
                <div class="col-3 border-right">
                    / /
                </div>
                <div class="col-3">
                    AM PM
                </div>
            </div>
        </div>
    </div>

    {{-- line 2 --}}

    <div class="row">
        <div class="col left">
            <div class="row  border-top-0">
                <div class="col-4">
                    ATTACHED PAGES
                </div>
                <div class="col-8">
                    YES NO
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    ESTIMATED DATE AND TIME OF ARRIVAL
                </div>
                <div class="col-4">
                    / /
                </div>
                <div class="col-4">
                    AM PM
                </div>
            </div>
        </div>

    </div>

    {{-- line 3 --}}

    <div class="row">
        <div id='left' class="col">
            <h5 class="text-center">SHIPPER INFORMATION</h5>
        </div>
        <div class="col">
            <h5 class="text-center">RECEIVER INFORMATION</h5>
        </div>

    </div>

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    STATE LICENSE #
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    STATE LICENSE #
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 4 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    TYPE OF LICENSE #
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    TYPE OF LICENSE #
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 5 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    BUSINESS NAME
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    BUSINESS NAME
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 6 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    BUSINESS ADDRESS
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    BUSINESS ADDRESS
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 7 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    CITY, STATE, ZIP CODE
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    CITY, STATE, ZIP CODE
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 8 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    PHONE NUMBER
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    PHONE NUMBER
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 9 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    CONTACT NAME
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    CONTACT NAME
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5 class="text-center">DISTRIBUTOR INFORMATION</h5>
        </div>
    </div>

    {{-- line 10 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    STATE LICENSE #
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    DRIVER'S NAME
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 11 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    BUSINESS NAME
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    CA DRIVER'S LICENSE#
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 12 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    STREET ADDRESS
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    VEHICLE MAKE
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 13 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    CITY, STATE, ZIP
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    VEHICLE MODEL
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 14 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    PHONE NUMBER
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    VEHICLE PLATE #
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
    </div>

    {{-- line 15 --}}

    <div class="row">
        <div id='left' class="col">
            <div class="row">
                <div class="col-4">
                    CONTACT NAME
                </div>
                <div class="col-8">

                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-4">
                    ACTUAL DATE TIME OF ARRIVAL
                </div>
                <div class="col-4">
                    / /
                </div>
                <div class="col-4">
                    AM PM
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5 class="text-center">PRODUCT SHIPPED DETAILS</h5>
            <h6 class="text-center">RECEIVER COMPLETES ONLY THE SHADED COLUMNS BELOW</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-1">
                    UID TAG NUMBER
                </div>
                <div class="col-5">
                    ITEM NAME
                </div>
                <div class="col-1">
                    QTY ORDERED
                </div>
                <div class="col-1">
                    QTY REC'D
                </div>
                <div class="col-1">
                    UNIT COST
                </div>
                <div class="col-1">
                    TOTAL COST
                </div>
                <div class="col-2">
                    RETAIL ONLY
                    <div class="row">
                        <div class="col-6">
                            UNIT RETAIL VALUE
                        </div>
                        <div class="col-6">
                            TOTAL RETAIL VALUE
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @for ($i = 0; $i < 6; $i++)
        @include('page1.product_line')
    @endfor

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


</div>


</div>
</body>
</html>
