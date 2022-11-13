<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->text('cart')->nullable();
            $table->double('total_mrp',14,2);
            $table->double('discount',14,2)->nullable()->default(0);
            $table->double('vat',14,2)->nullable()->default(0);
            $table->double('subtotal',14,2);
            $table->double('delivery_charge',14,2)->nullable()->default(0);
            $table->double('total',14,2);
            $table->string('pay_method');
            $table->string('comment')->nullable();

            $table->string('full_name');
            $table->string('email');
            $table->string('contact');
            $table->string('contact_ext');
            $table->text('address');
            $table->string('zip');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->integer('status')->default(0)->comment('0 pending, 1 processing, 2 delivered, 3 canceled');
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
        Schema::dropIfExists('orders');
    }
}
