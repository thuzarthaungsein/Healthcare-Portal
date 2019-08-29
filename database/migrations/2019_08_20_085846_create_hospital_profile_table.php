<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->text('access')->nullable();
            $table->text('medical_department')->nullable();
            $table->string('specialist')->nullable();
            $table->string('gallery')->nullable();
            $table->text('details_info')->nullable();
            $table->string('subject')->nullable();
            $table->text('closed_day')->nullable();
            $table->text('website')->nullable();
            $table->text('congestion')->nullable();
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
        Schema::dropIfExists('hospital_profile');
    }
}
