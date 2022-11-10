<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('code')->unique();
            $table->string('type')->nullable();
            $table->string('min_order_amt');
            $table->string('discount_amt');
            $table->string('status')->default(0);
            $table->string('user_status');
            $table->string('user_id')->default(0);
            $table->string('pty_number')->default(0);
            $table->string('trdx')->default(0);

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
        Schema::dropIfExists('coupons');
    }
}
