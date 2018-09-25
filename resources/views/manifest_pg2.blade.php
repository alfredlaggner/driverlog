<div class="container-fluid">
    <h5 class="text-center">SALES INVOICE / SHIPPING MANIFEST</h5>
    {{-- line 1 --}}


    <table style="table-layout: auto;" class="table_sm table-bordered">
        <tr>
            <td style="vertical-align:top; width: 90mm;"> @include('page2.top_left_table')</td>
            <td style="vertical-align:top; width: 90mm;"> @include('page2.top_right_table')</td>
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
    @if ($lastPage)
        @include ('product_bottom')
    @else
        @include('page_break')
    @endif

</div>
</body>
</html>
