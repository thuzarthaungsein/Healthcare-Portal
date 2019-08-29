<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursingProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nursing_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->text('access')->nullable();
            $table->string('gallery')->nullable();
            $table->text('feature')->nullable();
            $table->text('business_entity')->nullable();
            $table->text('date_of_establishment')->nullable();
            $table->text('land_right_form')->nullable();
            $table->text('building_right_form')->nullable();
            $table->text('site_area')->nullable();
            $table->text('floor_area')->nullable();
            $table->text('construction')->nullable();
            $table->text('capacity')->nullable();
            $table->text('num_rooms')->nullable();
            $table->text('residence_form')->nullable();
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
        Schema::dropIfExists('nursing_profile');
    }
}
