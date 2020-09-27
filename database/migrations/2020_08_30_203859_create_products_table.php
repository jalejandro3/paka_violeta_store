<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('color_id')->constrained();
            $table->foreignId('size_id')->constrained();
            $table->string('sku');
            $table->double('price')->default(0);
            $table->string('description');
            $table->string('image');
            $table->boolean('is_sold')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::table('brands', function (Blueprint $table) {
        $table->dropForeign('product_brand_id_foreign');
        $table->dropForeign('product_color_id_foreign');
        $table->dropForeign('product_size_id_foreign');
    });
        Schema::dropIfExists('products');
    }
}
