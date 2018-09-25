<?php
$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
?>
<style>
    th {
        vertical-align: center;
        width: auto;
    }
</style>

<table style="table-layout: auto; width: 178mm;" class="table-sm table-bordered">
    <thead>
    <tr>
        <th style="">UID NUMBER</th>
        <th style="width: 80mm">ITEM NAME</th>
        <th style="width: 20mm">QTY ORDERED</th>
        <th scope="col">QTY REC'D</th>
        <th scope="col">UNIT COST</th>
        <th scope="col">TOTAL COST</th>
        <th scope="col"> UNIT RETAIL VALUE</th>
        <th scope="col">TOTAL RETAIL VALUE</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td> {{ str_replace(['[',']'],'',substr($product->name,0,8)) }}</td>
            <td> {{ substr($product->name,9,50) }}</td>
            <td   style="width: 5mm" class="text-right"> {{ $product->quantity }}</td>
            <td class="grey"></td>
            <td class="text-right">  {{ $fmt->formatCurrency($product->unit_price, "USD")."\n" }}</td>
            <td class="text-right"> {{ $fmt->formatCurrency( $product->unit_price * $product->quantity, "USD")."\n" }}</td>
            <td class="grey"></td>
            <td class="grey"></td>
        </tr>
        @if ($loop->iteration == 7)
            @break
        @endif
    @endforeach
    </tbody>
</table>