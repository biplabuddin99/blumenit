<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootercol1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footercol1s', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('title');
            $table->string('text');
            $table->string('copyright_notice');
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
        Schema::dropIfExists('footercol1s');
    }
}
