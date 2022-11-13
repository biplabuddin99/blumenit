<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesection3viewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homesection3views', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading1');
            $table->string('heading2');
            $table->longText('details');
            $table->string('feature_image');
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
        Schema::dropIfExists('homesection3views');
    }
}
