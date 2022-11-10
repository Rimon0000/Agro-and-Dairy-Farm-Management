<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_image');
            $table->string('product_size')->nullable();
            $table->string('product_weight')->nullable();
            $table->integer('product_qty');
            $table->integer('total_price');
            $table->integer('coupon_price')->default(0);
            $table->integer('user_status')->nullable();

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
        Schema::dropIfExists('carts');
    }
}
