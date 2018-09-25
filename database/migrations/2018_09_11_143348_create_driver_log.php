<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id')->nullable();
            $table->integer('salesperson_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('complaint_id')->nullable();
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
        Schema::dropIfExists('driver_logs');
    }
}
