<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('payment_name');
            $table->string('expense_moving');
            $table->string('monthly_fees');
            $table->string('living_room_type');
            $table->string('area');
            $table->integer('details')->default(0);
            $table->string('deposit')->nullable();
            $table->string('other_use')->nullable();
            $table->string('rent')->nullable();
            $table->string('admin_expense')->nullable();
            $table->string('food_expense')->nullable();
            $table->string('nurse_care_surcharge')->nullable();
            $table->string('other_monthly_cost')->nullable();
            $table->string('refund_system')->nullable();
            $table->string('depreciation_period')->nullable();
            $table->string('initial_deprecration')->nullable();
            $table->string('other_message_refund')->nullable();
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
        Schema::dropIfExists('method_payment');
    }
}
