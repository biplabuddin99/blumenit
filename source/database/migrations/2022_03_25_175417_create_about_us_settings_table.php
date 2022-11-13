<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_image')->nullable();
            $table->string('fsecimage')->nullable();
            $table->string('fsectitle1')->nullable();
            $table->string('fsectitle2')->nullable();
            $table->string('fsectitle3')->nullable();
            $table->text('fsecdetails')->nullable();
            $table->string('visionimage')->nullable();
            $table->text('visiondetails')->nullable();
            $table->string('missionimage')->nullable();
            $table->text('missiondetails')->nullable();
            $table->string('goalsimage')->nullable();
            $table->text('goalsdetails')->nullable();
            $table->text('promisetext')->nullable();
            $table->string('relationimage')->nullable();
            $table->text('relationdetails')->nullable();
            $table->string('targetimage')->nullable();
            $table->text('targetdetails')->nullable();
            $table->string('retailimage')->nullable();
            $table->text('retaildetails')->nullable();
            $table->text('visionlastdetails')->nullable();
            $table->string('visionimage1')->nullable();
            $table->text('visiondetails1')->nullable();
            $table->string('visionimage2')->nullable();
            $table->text('visiondetails2')->nullable();
            $table->string('visionimage3')->nullable();
            $table->text('visiondetails3')->nullable();
            $table->string('visionimage4')->nullable();
            $table->text('visiondetails4')->nullable();
            $table->string('visionimage5')->nullable();
            $table->text('visiondetails5')->nullable();
            $table->string('visionimage6')->nullable();
            $table->text('visiondetails6')->nullable();
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
        Schema::dropIfExists('about_us_settings');
    }
}
