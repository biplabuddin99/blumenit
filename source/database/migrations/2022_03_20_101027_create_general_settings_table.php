<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('max_shipping_time')->nullable();
            $table->string('min_shipping_time')->nullable();
            $table->string('shipping_charge')->nullable();
            $table->integer('cod_status')->nullable()->default(0);
            $table->string('cod_name')->nullable();
            $table->text('cod_note')->nullable();
            $table->integer('online_pay_status')->nullable()->default(0);
            $table->string('online_pay_name')->nullable();
            $table->text('online_pay_note')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
