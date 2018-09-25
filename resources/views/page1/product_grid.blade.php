<?php
$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
?>
<style>
    th {
        vertical-align: center;
        width: auto;
    }
</style>

<th style=""></th>
<th style="width: 80px"></th>
<th style="width: 20px"></th>
<th scope="col"></th>
<th scope="col"></th>
<th scope="col"></th>
<th scope="col"></th>
<th scope="col"></th>
<div class="container" style="width: 19cm">
    <div class="row">
        <div class="col-xs-8">
            UID NUMBER
        </div>
        <div class="col-xs-8">
            ITEM NAME
        </div>
        <div class="col-xs-8">
            QTY ORDERED
        </div>
        <div class="col-xs-8">
            UNIT COST
        </div>
        <div class="col-xs-8">
            TOTAL COST
        </div>
        <div class="col-xs-8">
            UNIT RETAIL VALUE
        </div>
        <div class="col-xs-8">
            TOTAL RETAIL VALUE
        </div>
    </div>

    @foreach ($products as $product)
        <div class="row">
            <div class="col-xs-8">
                {{ str_replace(['[',']'],'',substr($product->name,0,8)) }}
            </div>
            <div class="col-xs-8">
                {{ substr($product->name,9,50) }}
            </div>
            <div class="col-xs-8">
                {{ $product->quantity }}
            </div>
            <div class="col-xs-8">
                {{ $fmt->formatCurrency($product->unit_price, "USD")."\n" }}
            </div>
            <div class="col-xs-8">
                {{ str_replace(['[',']'],'',substr($product->name,0,8)) }}
            </div>
            <div class="col-xs-8"> {{ str_replace(['[',']'],'',substr($product->name,0,8)) }}
            </div>
            <div class="col-xs-8">

            </div>
            <div class="col-xs-8">

            </div>
        </div>
</div>

@if ($loop->iteration == 7)
@break
@endif
@endforeach
</tbody>
</table>