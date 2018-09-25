<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manifest Print</title>
</head>
<body>

@php
        @endphp

@while ($printed < $productCount)
    @php
        $lastPage = false;
        $fewerLines = $pageLines - $footerLines;
    @endphp
    @if ($offset == 0)
        @include('manifest_information')
    @else
        @include('manifest_attachment',['page' => $page,'pages'=> $pageCount + 1])
    @endif
    @if ($remainingLines > ($pageLines-$footerLines))
        @php
            echo "fl=". $fewerLines;
                echo "Do all lines fit with footer?:" . $remainingLines . "< fewerlines ="  . $fewerLines . "?<br>";
        @endphp
        @if ($remainingLines > $productCount)
            @php
                $products = App\SaleInvoice::skip($offset)->limit($pageLines)->get();
            @endphp
            @include('product_lines')
            @include ('page_break')
            @php
                echo "LIMITED page" . $page . "<br>";
                echo "Page: " . $page . "<br>";
                 $page = $page + 1;
                 $printed = $printed +  $pageLines;
                 $offset = $offset + $pageLines;
                 $remainingLines = $productCount - $offset;
            @endphp

        @else
            @php
                $products = App\SaleInvoice::skip($offset)->limit($remainingLines  - 1)->get();
            @endphp
            @include('product_lines')
            @include ('page_break')
            @php
                echo "FULL page" . $page . "<br>";
                echo "Page: " . $page . "<br>";
                 $page = $page + 1;
                 $printed = $printed +  $remainingLines - 1;
                $offset = $offset +  $remainingLines - 1;
                $remainingLines = $productCount - $offset;
            @endphp
        @endif
    @else
        @php
            $lastPage = true;
            $products = App\SaleInvoice::skip($offset)->limit($remainingLines)->get();
            echo  App\SaleInvoice::skip($offset)->limit($remainingLines)->count();
        @endphp
        @include('product_lines')
        @include ('product_bottom')
        @php
            $printed = $productCount;
                echo "LAST page" . $page ."<br>";
                echo "Page: " .  "<br>";
                echo  "Printed Lines: "  . $printed . " - of " . $productCount . "<br>";
                 echo "Printed Lines: "  . $printed . "-" . $productCount . "<br>";
                 echo "Offset:" . $offset . "<br>";
                 echo "Remaining Lines:" . $remainingLines . "> pageLines - footerLines="  . $fewerLines . "?<br>";
        @endphp
    @endif
    @php
        $pageLines = $morePageLines;
        $fewerLines = $pageLines - $footerLines;
    @endphp

@endwhile
</body>
</html>