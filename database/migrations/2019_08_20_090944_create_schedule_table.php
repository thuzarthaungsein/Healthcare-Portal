<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mon')->nullable();
            $table->string('tue')->nullable();
            $table->string('wed')->nullable();
            $table->string('thu')->nullable();
            $table->string('fri')->nullable();
            $table->string('sat')->nullable();
            $table->string('sun')->nullable();
            $table->string('part')->nullable();
            $table->integer('customer_id');
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
        Schema::dropIfExists('schedule');
    }
}
