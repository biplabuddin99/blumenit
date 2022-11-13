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
            $table->string('sku');
            $table->string('name');
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('product_title');
            $table->string('feature_image');
            $table->longText('short_description');
            $table->longText('long_description');
            $table->longText('key_features');
            $table->longText('specifications');
            $table->string('warranty');
            $table->string('product_condition');
            $table->string('vat_status');
            $table->decimal('price',10,2);
            $table->decimal('discount',10,2);
            $table->integer('qty');
            $table->integer('review')->comment('values=>1,2,3,4,5');
            $table->integer('new_product')->comment('1=>yes,2=>no');
            $table->integer('feature_product')->comment('1=>yes,2=>no');
            $table->integer('limited_product')->comment('1=>yes,2=>no');
            $table->integer('outofstock_product')->comment('1=>yes,2=>no');
            $table->integer('best_seller')->comment('1=>yes,2=>no');
            $table->integer('offer')->comment('1=>yes,2=>no');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('products');
    }
}
