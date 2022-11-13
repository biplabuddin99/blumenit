<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_inquiries', function (Blueprint $table) {
            $table->id();
            $table->integer('title');
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('corporate_inquiries');
    }
}
