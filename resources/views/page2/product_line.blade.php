<div class="row">
    <div class="col">
        <?php
        $fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        ?>
        @foreach ($products as $product)

            <div class="row">

                <div class="col-1">
                    {{ str_replace(['[',']'],'',substr($product->name,0,8)) }}
                </div>
                <div class="col-5">
                    {{ substr($product->name,9,50) }}
                </div>
                <div class="col-1 text-right">
                    {{ $product->quantity }}
                </div>

                <div class="col-1 grey">
                    __________

                </div>
                <div class="col-1 text-right">
                    {{ $fmt->formatCurrency($product->unit_price, "USD")."\n" }}
            </div>
                <div class="col-1 text-right">
                    {{ $fmt->formatCurrency( $product->unit_price * $product->quantity, "USD")."\n" }}
                </div>
                <div class="col-1 grey">
                    __________
                </div>
                <div class="col-1 grey">
                    __________

                </div>
            </div>

        @endforeach

    </div>
</div>
