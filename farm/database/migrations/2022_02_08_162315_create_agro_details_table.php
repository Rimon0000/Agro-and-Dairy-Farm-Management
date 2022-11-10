<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgroDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agro_details', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('product_id');
            $table->string('product_name');
            $table->string('weight');
            $table->string('milk_per_day');
            $table->string('cost_price');
            $table->string('sale_price')->nullable();
            $table->string('product_breed')->nullable();
            $table->string('product_gender')->nullable();
            $table->string('product_age');
            $table->string('location');
            $table->string('category_id');
            $table->string('subcategory_id')->nullable();

            $table->text('product_detail_short')->nullable();
            $table->text('product_detail_long')->nullable();
            
            $table->string('default_img');
            $table->string('product_img_1')->nullable();
            $table->string('product_img_2')->nullable();
            $table->string('product_img_3')->nullable();
            $table->string('product_img_4')->nullable();

            $table->string('product_img_alt_1')->nullable();
            $table->string('product_img_alt_2')->nullable();
            $table->string('product_img_alt_3')->nullable();
            $table->string('product_img_alt_4')->nullable();

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
        Schema::dropIfExists('agro_details');
    }
}
