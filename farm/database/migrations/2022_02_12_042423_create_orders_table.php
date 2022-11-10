<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('user_name');
            $table->string('user_number');
            $table->string('user_email');
            $table->string('pyt_method');
            $table->string('pty_number');
            $table->string('trdx');
            $table->string('address');
            $table->string('street');
            $table->string('city');
            $table->string('country');
            $table->string('pin_code');
            $table->string('total_products');
            $table->string('total_price');

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
        Schema::dropIfExists('orders');
    }
}
