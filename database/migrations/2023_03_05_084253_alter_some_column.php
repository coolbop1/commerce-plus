<?php

use App\Models\Product;
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
            $table->integer('min_qty')->default(1)->change();
            $table->double('discount')->default(0)->change();
            $table->double('tax')->default(0)->change();
            $table->integer('vat')->default(0)->change();
            $table->boolean('is_digital')->default(0);
        });
        Product::whereNull('min_qty')->update(['min_qty' => 1]);
        Product::where('min_qty', 0)->update(['min_qty' => 1]);
        Product::whereNull('discount')->update(['discount' => 0]);
        Product::whereNull('tax')->update(['tax' => 0]);
        Product::whereNull('vat')->update(['vat' => 0]);
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
