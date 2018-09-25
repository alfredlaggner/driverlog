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

@if (! $extraPages)
    @if($firstPageLines > $totalLines)

        @include('page1.product_table')
        @include ('product_bottom')
    @endif
@elseif ($extraPages == 1)
    @php
        echo $extraPages;
    @endphp
    @if ($totalLines <= $firstPageTotal)
        @include('page1.product_table')
        @include ('page_break')
        @include ('product_bottom')
    @else
        @php
            $offset =  0;
            $products = App\SaleInvoice::skip($offset)->limit($firstPageTotal)->get();
         //   echo $products->count();
        @endphp
        @include('page1.product_table')
        @include ('page_break')

        @include('manifest_attachment',['page' => 1 ,'pages'=> $extraPages])
        @php
            $offset = $firstPageTotal;
            $products = App\SaleInvoice::skip($offset)->limit($firstPageTotal)->get();
        @endphp
        @include('page1.product_table')
        @include ('product_bottom')

    @endif
@elseif ($extraPages > 1)
    $remainingLines = 0;
    {{--first page--}}
    @php
        $offset =  0;
        $products = App\SaleInvoice::skip($offset)->limit($firstPageTotal)->get();
     //   echo $products->count();
    @endphp
    @include('page1.product_table')
    @include ('page_break')
    {{-- more pages--}}
    $remainingLines = $totalLines - $firstPageTotal;

    @for ($i = 1; $i <= $extraPages; $i++)
        @php
            echo 'i = ' . $i;
            echo '<br>';
            echo 'extraPages = ' . $extraPages;
            $offset =  $offset + $i==1 ? $firstPageTotal : $attachedPageTotal;
            $remainingLines = $totalLines - $attachedPageTotal;

   echo 'offset = ' . $offset . '<br>';
            $products = App\SaleInvoice::skip($offset)->limit($attachedPageTotal)->get();
       echo 'totalLines = ' . $totalLines  . '<br>';
       echo 'remainingLines = ' . $remainingLines  . '<br>';
       echo 'attachedPageLines = ' . $attachedPageLines  . '<br>';
        @endphp
        @if ($offset < $totalLines )
            @include('manifest_attachment',['page' => $i ,'pages'=> $extraPages])
            @include('page1.product_table')
        @else
            @if ($attachedPageLines >=$remainingLines)
                @include ('product_bottom')
            @endif
            @include ('page_break')
            @include ('product_bottom')
        @endif
        @php
            //          echo 'i = ' . $i;
             //         echo '<br>';
             //         echo 'extraPages = ' . $extraPages;
             //         echo '<br.';
             echo 'offset2 = ' . $offset . '<br>';
             echo 'totalLines = ' . $totalLines . '<br>';
        @endphp
    @endfor
@endif
{{--
@while ($printed < $productCount)
    @php
        $lastPage = false;
        $fewerLines = $pageLines - $footerLines;
    @endphp
    @if ($offset == 0)
        @include('manifest_information')
    @else
        @include('manifest_attachment',['page' => $pageAttached,'pages'=> $pageTotal])
    @endif
    @if ($remainingLines > ($pageLines-$footerLines))
        @php
                @endphp
        @if ($remainingLines >= $productCount)
            @php
                $products = App\SaleInvoice::skip($offset)->limit($pageLines)->get();
            @endphp
            @include('product_lines')
            @include ('page_break')
            @php
                $pageAttached = $pageAttached + 1;
                $printed = $printed +  $pageLines;
                $offset = $offset + $pageLines;
                $remainingLines = $productCount - $offset;
            @endphp

        @else
            @php
                $products = App\SaleInvoice::skip($offset)->limit($remainingLines  - 0)->get();
            @endphp
            @include('product_lines')
            @include ('page_break')
            @php
                $printed = $printed +  $remainingLines - 0;
                $offset = $offset +  $remainingLines - 0;
                $remainingLines = $productCount - $offset;
            @endphp
        @endif
    @else
        @php
            $lastPage = true;
            $products = App\SaleInvoice::skip($offset)->limit($remainingLines)->get();
        @endphp
        @include('product_lines')
        @include ('product_bottom')

        @php
            $printed = $productCount;
        @endphp
    @endif
    @php
        $pageLines = $attachedPageLines;
        $fewerLines = $pageLines - $footerLines;
    @endphp

@endwhile
--}}
</body>
</html>