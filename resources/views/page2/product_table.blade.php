<?php
$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
?>
<style>
    th,
    td {
        vertical-align: center;
    }
</style>

<table style="table-layout: fixed; width: 100%" class="table table-bordered">
    <thead>
    <tr style="">
        <th>UID</th>
        <th>ITEM NAME</th>
        <th>QTY ORD</th>
        <th>QTY REC'D</th>
        <th>UNIT COST</th>
        <th>TOTAL COST</th>
        <th> UNIT RETAIL VALUE</th>
        <th>TOTAL RETAIL VALUE</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
                <tr>
                    <td style="width: 8%;vertical-align: center;"> {{ str_replace(['[',']'],'',substr($product->name,0,8)) }}</td>
                    <td style="width: 40%;"> {{ substr($product->name,9,80) }}</td>
                    <td style="width: 5%" class="text-right"> {{ $product->quantity }}</td>
                    <td style="width: 5%" class="grey"></td>
                    <td style="width: 8%"
                        class="text-right">  {{ $fmt->formatCurrency($product->unit_price, "USD")."\n" }}</td>
                    <td style="width: 8%"
                        class="text-right"> {{ $fmt->formatCurrency( $product->unit_price * $product->quantity, "USD")."\n" }}</td>
                    <td style="width: 8%" class="grey"></td>
                    <td style="width: 8%" class="grey"></td>
                </tr>
    @endforeach
    </tbody>
</table>