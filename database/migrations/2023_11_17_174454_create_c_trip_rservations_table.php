<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCTripRservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_trip_rservations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('property_id');
            $table->string('paid_amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->softDeletes();
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
        Schema::dropIfExists('c_trip_rservations');
    }
}
