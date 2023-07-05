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
        Schema::create('route_trails', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('delivery_boy_id')->nullable();
            $table->enum('destination_type', ['station', 'hub', 'town', 'door']);
            $table->integer('destination_hub_id')->nullable();
            $table->integer('destination_station_id')->nullable();
            $table->integer('destination_town_id')->nullable();
            $table->enum('origin_type', ['station', 'hub', 'town']);
            $table->integer('origin_hub_id')->nullable();
            $table->integer('origin_station_id')->nullable();
            $table->integer('origin_town_id')->nullable();
            $table->enum('status', ['in_transit', 'awaiting_delivery', 'delivered'])->default('in_transit') ;
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
        Schema::dropIfExists('route_trails');
    }
};
