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
        Schema::table('products', function (Blueprint $table) {
            $table->double('weight')->nullable();
            $table->integer('min_qty')->nullable();
            $table->longText('tags')->nullable();
            $table->string('barcode')->nullable();
            $table->boolean('refundable')->default(1)->nullable();
            $table->string('photos')->nullable();
            $table->enum('thumbnail_img', ['youtube', 'dailymotion', 'vimeo'])->default('youtube')->nullable();
            $table->string('video_link')->nullable();
            $table->string('date_range')->nullable();
            $table->double('discount')->nullable();
            $table->enum('discount_type', ['amount', 'percentage'])->default('amount')->nullable();
            $table->integer('unit')->nullable();
            $table->string('sku')->nullable();
            $table->string('external_link')->nullable();
            $table->string('external_link_btn')->nullable();
            $table->string('files')->nullable();
            $table->string('pdf')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_img')->nullable();
            $table->enum('shipping_type', ['free', 'flat_rate'])->default('flat_rate')->nullable();
            $table->integer('low_stock_quantity')->nullable();
            $table->enum('stock_visibility_state', ['quantity', 'text', 'hide'])->default('quantity')->nullable();
            $table->boolean('cash_on_delivery')->default(1)->nullable();
            $table->integer('est_shipping_days')->nullable();
            $table->integer('tax')->nullable();
            $table->enum('tax_type', ['amount', 'percent'])->default('amount')->nullable();
            $table->integer('vat')->nullable();
            $table->enum('vat_type', ['amount', 'percent'])->default('amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
