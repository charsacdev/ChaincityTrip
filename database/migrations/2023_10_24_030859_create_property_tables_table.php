<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_tables', function (Blueprint $table) {
            $table->id();
            $table->string('agent_id');
            $table->string('property_type');
            $table->string('guest_type');
            $table->string('property_country');
            $table->string('property_state');
            $table->string('property_city');
            $table->string('property_location');
            $table->json('property_basics');
            $table->json('property_offers');
            $table->json('property_photos');
            $table->text('property_title');
            $table->json('property_describe');
            $table->text('property_description_text');
            $table->string('reservation_type');
            $table->string('property_price');
            $table->json('reservation_discount');
            $table->string('reservation_status');
            $table->json('hosting_extras');
            $table->string('property_status');
            $table->json('property_process');
            $table->string('property_ratings');
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
        Schema::dropIfExists('property_tables');
    }
}
