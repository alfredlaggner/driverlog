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
    @endphp
    @if ($remainingLines > ($pageLines-$footerLines) or $offset == 0)
        @if ($offset == 0)
            @if (  $productCount < $pageLines - $footerLines)
                @php
                    echo "xxxs" . $pageLines , '-' . $footerLines;
                    $lastPage = true;
                    $products = App\SaleInvoice::all();
                @endphp
                @include('manifest_pg1',['lastPage' => $lastPage])
            @else
                @php
                    $lastPage = false;
                                        $remainingLines = $productCount - $offset;
                    $products = App\SaleInvoice::offset($offset)->limit($remainingLines-1)->get();
                @endphp
                @include('manifest_pg1',['lastPage' => $lastPage])
            @endif
            @php
                echo "FIRST page" . $page . "<br>";
                echo "Page: " . $page . "<br>";

                $page = $page + 1;
                $printed = $printed +  $pageLines;
                $offset = $offset + $remainingLines -1 ;
                $pageLines = $morePageLines;
                $fewerLines = $pageLines - $footerLines;

                echo  "Printed Lines: "  . $printed . " - of " . $productCount . "<br>";
                 echo "Offset:" . $offset . "<br>";

            @endphp

        @else
            @php
                echo "fl=". $fewerLines;
                    echo "Do all lines fit with footer?:" . $remainingLines . "< fewerlines ="  . $fewerLines . "?<br>";
            @endphp
            @if ($remainingLines > $productCount)
                @php
                    $products = App\SaleInvoice::skip($offset)->limit($pageLines)->get();
                @endphp
                @include('manifest_pg2',['page' => $page,'pages'=> $pageCount,  'lastPage' => $lastPage])
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
                @include('manifest_pg2',['page' => $page,'pages'=> $pageCount,  'lastPage' => $lastPage])
                @php
                    echo "FULL page" . $page . "<br>";
                    echo "Page: " . $page . "<br>";
                     $page = $page + 1;
                                    $printed = $printed +  $remainingLines - 1;
                    $offset = $offset +  $remainingLines - 1;
                    $remainingLines = $productCount - $offset;
                @endphp

            @endif

        @endif
    @else
        @php
            $lastPage = true;
        $products = App\SaleInvoice::skip($offset)->limit($remainingLines)->get();
        echo  App\SaleInvoice::skip($offset)->limit($remainingLines)->count();
        @endphp
        @include('manifest_pg2',['page' => $page,'pages'=> $pageCount, 'lastPage' => $lastPage])
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
            @endphp
@endwhile
</body>
</html>