<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_settings', function (Blueprint $table) {
            $table->id();
            $table->string('mp_add')->nullable;
            $table->string('mp_add_link')->nullable;
            $table->string('fp_add')->nullable;
            $table->string('fp_add_link')->nullable;
            $table->string('large_add')->nullable;
            $table->string('large_add_link')->nullable;
            $table->string('small_add1')->nullable;
            $table->string('small_add1_link')->nullable;
            $table->string('small_add2')->nullable;
            $table->string('small_add2_link')->nullable;
            $table->string('small_add3')->nullable;
            $table->string('small_add3_link')->nullable;
            $table->string('bs_add')->nullable;
            $table->string('bs_add_link')->nullable;
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
        Schema::dropIfExists('category_settings');
    }
}
