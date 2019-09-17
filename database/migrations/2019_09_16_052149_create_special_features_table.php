<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
<<<<<<< HEAD:database/migrations/2019_09_11_051843_create_special_features_table.php
            $table->string('shortname');
            $table->text('type');
=======
            $table->string('short_name');
            $table->string('type');
>>>>>>> 2ac19d7b90124f6ba146bb633fc817c20f8eb4d8:database/migrations/2019_09_16_052149_create_special_features_table.php
            $table->integer('user_id');
            $table->integer('recordstatus')->default(1);
            $table->timestamps();
        });
<<<<<<< HEAD:database/migrations/2019_09_11_051843_create_special_features_table.php

=======
>>>>>>> 2ac19d7b90124f6ba146bb633fc817c20f8eb4d8:database/migrations/2019_09_16_052149_create_special_features_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_features');
    }
}
