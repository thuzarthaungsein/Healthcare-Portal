<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PasswordResetView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
    VIEW `healthcare_portal`.`password_reset_view` AS
    SELECT 
        `healthcare_portal`.`password_reset`.`id` AS `id`,
        `u`.`name` AS `name`,
        `healthcare_portal`.`password_reset`.`email` AS `email`,
        `healthcare_portal`.`password_reset`.`password` AS `password`,
        `healthcare_portal`.`password_reset`.`status` AS `status`,
        
        `u`.`id` AS `user_id`,
        `cus`.`id` AS `customer_id`
    FROM
        ((`healthcare_portal`.`password_reset`
        LEFT JOIN `healthcare_portal`.`users` `u` ON (`healthcare_portal`.`password_reset`.`user_id` = `u`.`id`))
        LEFT JOIN `healthcare_portal`.`customers` `cus` ON (`healthcare_portal`.`password_reset`.`customer_id` = `cus`.`id`))
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_reset_view');
    }
}
