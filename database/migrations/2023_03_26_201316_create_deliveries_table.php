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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('delivery_boy_id')->nullable();
            $table->enum('status', ['pending', 'picked_up', 'on_the_way', 'delivered'])->default('pending');
            $table->enum('delivery_type', ['home_delivery', 'outlet'])->default('outlet');
            $table->double('delivery_amount')->default(0.00);
            $table->string('last_logged_lat')->nullable();
            $table->string('last_logged_long')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
};
