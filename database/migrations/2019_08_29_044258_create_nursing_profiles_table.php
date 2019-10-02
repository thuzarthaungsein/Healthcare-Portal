<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursingProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nursing_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->text('access')->nullable();
            $table->string('gallery')->nullable();
            $table->text('feature')->nullable();
            $table->string('method')->nullable();
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
            $table->text('fac_type')->nullable();
            $table->text('occupancy_condition')->nullable();
            $table->text('room_floor')->nullable();
            $table->text('living_room_facilities')->nullable();
            $table->text('equipment')->nullable();
            $table->text('acceptance_remark')->nullable();
            $table->text('dementia')->nullable();
            $table->text('staff_system')->nullable();
            $table->text('special_features')->nullable();
            $table->double('latitude',15,10)->nullable();
            $table->double('longitude',15,10)->nullable();
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
        Schema::dropIfExists('nursing_profiles');
    }
}
