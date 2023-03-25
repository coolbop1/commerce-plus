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
        Schema::create('vendor_payment_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id');
            $table->double('amount');
            $table->date('payment_date')->nullable();
            $table->enum('payment_method', ['cash', 'cheque', 'transfer'])->default('transfer');
            $table->longText('request_message')->nullable();
            $table->enum('status', ['pending', 'paid'])->default('pending');
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
        Schema::dropIfExists('vendor_payment_requests');
    }
};
