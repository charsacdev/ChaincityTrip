<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_tables', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('transaction_id');
            $table->string('amount');
            $table->string('currency_type');
            $table->string('payment_id');
            $table->string('transaction_date');
            $table->string('transaction_status');
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
        Schema::dropIfExists('payment_tables');
    }
}
