<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('total_amount');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->string('phone');
            $table->string('address');
            $table->enum('order_type', ['cod','card']);
            $table->string('payment_refrence')->nullable();
            $table->string('coupon')->nullable();
            $table->integer('state_id');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('checkouts');
    }
};
