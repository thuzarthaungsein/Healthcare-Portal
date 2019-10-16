<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('customer_id');
            $table->integer('occupation_id');
            $table->text('description');
            $table->text('skills');
            $table->text('location');
            $table->text('nearest_station');
            $table->string('employment_status');
            $table->string('salary');
            $table->text('allowances');
            $table->text('insurance');
            $table->text('working_hours');
            $table->text('holidays');
            $table->string('job_number');
            $table->integer('user_id');
            $table->integer('recordstatus')->default(1);
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
        Schema::dropIfExists('jobs');
    }
}
