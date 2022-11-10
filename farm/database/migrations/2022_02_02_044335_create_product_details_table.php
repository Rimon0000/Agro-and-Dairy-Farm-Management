<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');  
            $table->string('product_id');
            $table->string('product_name');
            $table->string('weight')->nullable();
            $table->string('size')->nullable();
            $table->string('cost_price');
            $table->string('sale_price');
            $table->string('discount_price')->nullable();
            $table->string('stock_qty')->nullable();
            $table->string('stock_alert')->nullable();
            $table->string('category_id');
            $table->string('subcategory_id');
            
            $table->text('product_detail_short')->nullable();
            $table->text('product_detail_long')->nullable();
                     
            $table->string('user_status')->nullable();                 

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
        Schema::dropIfExists('product_details');
    }
}
