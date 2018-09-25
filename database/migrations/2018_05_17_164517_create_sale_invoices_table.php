<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleinvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number',10)->nullable();
            $table->date('order_date')->nullable();
            $table->string('ext_id_shipping',50)->nullable();
            $table->text('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('ext_id_unit',50)->nullable();
            $table->double('unit_price',8,2)->nullable();
            $table->index(['ext_id_shipping']);
            $table->index(['ext_id_unit']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleinvoices');
    }
}
