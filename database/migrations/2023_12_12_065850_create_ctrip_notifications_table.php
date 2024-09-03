<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtripNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctrip_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('receiver_id');
            $table->text('notification_type');
            $table->text('title');
            $table->text('message');
            $table->text('read');
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
        Schema::dropIfExists('ctrip_notifications');
    }
}
