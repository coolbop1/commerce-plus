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
        Schema::table('hub_connects', function (Blueprint $table) {
            $table->string('small')->default(0);
            $table->string('medium')->default(0);
            $table->string('large')->default(0);
            $table->string('heavy')->default(0);
            $table->integer('sla_min')->default(1);
            $table->integer('sla_max')->default(1);
            $table->double('rate')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hub_connects', function (Blueprint $table) {
            //
        });
    }
};
