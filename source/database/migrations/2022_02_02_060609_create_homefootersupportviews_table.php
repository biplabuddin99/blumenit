<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomefootersupportviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homefootersupportviews', function (Blueprint $table) {
            $table->id();
            $table->string('header_1st');
            $table->string('details_1st');
            $table->string('image_1st');
            $table->string('header_2nd');
            $table->string('details_2nd');
            $table->string('image_2nd');
            $table->string('header_3rd');
            $table->string('details_3rd');
            $table->string('image_3rd');
            $table->string('header_4th');
            $table->string('details_4th');
            $table->string('image_4th');
            $table->integer('status')->default('1')->comment('1 => active , 2 => inactive');
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
        Schema::dropIfExists('homefootersupportviews');
    }
}
