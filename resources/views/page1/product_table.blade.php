<?php
$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
?>
<style>
    th {
        vertical-align: center;
        width: auto;

    }
    .grey {
        background-color: lightgray;
    }


</style>

<table style="table-layout: fixed; width: 100%" class="table table-bordered">
    <thead>
    <tr style="">
        <th>UID</th>
        <th>ITEM NAME</th>
        <th>QTY ORD</th>
        <th>QTY REC'D</th>
        <th >UNIT COST</th>
        <th>TOTAL COST</th>
        <th> UNIT RETAIL VALUE</th>
        <th>TOTAL RETAIL VALUE</th>
    </tr>
    </thead>
    <tbody>
@php
@endphp
    @foreach ($products as $product)
        <tr>
            <td style="width: 6%"> {{ $product->code }}</td>
            <td style="width: 62%;"> {{ substr($product->name,9,80) }}</td>
            <td style="width: 3%" class="text-right"> {{ $product->quantity }}</td>
            <td style="width: 3%" class="grey"></td>
            <td style="width: 5%" class="text-right">  {{ $fmt->formatCurrency($product->unit_price, "USD")."\n" }}</td>
            <td style="width: 8%" class="text-right"> {{ $fmt->formatCurrency( $product->unit_price * $product->quantity, "USD")."\n" }}</td>
            <td style="width: 5%" class="grey"></td>
            <td style="width: 8%" class="grey"></td>
        </tr>
    @endforeach
    </tbody>
</table>