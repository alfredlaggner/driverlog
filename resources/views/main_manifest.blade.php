<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manifest Print</title>
</head>
<body>

@php
    $offset = 0;
    $products = App\SaleInvoice::offset($offset)->limit($firstPageTotal)->get();
@endphp
@include('manifest_information')
@include('page1.product_table')
@if ( ! $isAttachedPages )
    @if($isSamePageFirst)
        @include ('product_bottom')
    @else
        @include ('page_break')
        @include ('product_bottom')
    @endif
@else
    @include ('page_break')
    @php
        $offset = $firstPageTotal;
    @endphp
    @for ($i = 1; $i <= $attachedPages; $i++)
        @php
            $remainingLines = $totalLines - $attachedPageTotal;
            $products = App\SaleInvoice::skip($offset)->limit($attachedPageTotal)->get();
            $offset =  $offset + $attachedPageTotal;
        @endphp
        @include('manifest_attachment',['page' => $i ,'pages'=> $attachedPages])
        @php
                @endphp
        @include('page1.product_table')
        @if ($i < $attachedPages)
            @include ('page_break')
        @endif
    @endfor
    @if ($isSamePageAttached)
        @include ('product_bottom')
    @else
        @include ('page_break')
        @include ('product_bottom')
    @endif
@endif
</body>
</html>