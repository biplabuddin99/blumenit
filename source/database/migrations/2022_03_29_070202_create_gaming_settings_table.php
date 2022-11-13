<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaming_settings', function (Blueprint $table) {
            $table->id();
            $table->string('mp_add')->nullable;
            $table->string('mp_add_link')->nullable;
            $table->string('fp_add')->nullable;
            $table->string('fp_add_link')->nullable;
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
        Schema::dropIfExists('gaming_settings');
    }
}
