<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('comment');
            $table->string('email');
            $table->string('name');
            $table->string('year');
            $table->integer('gender');
            $table->string('zipcode')->nullable();
            $table->integer('customer_id');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('comments');
    }
}
