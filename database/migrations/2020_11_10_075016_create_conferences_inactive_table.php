<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencesInactiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conferences_inactives', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cm');
            $table->string('room_type')->nullable();
            $table->integer('room_pin')->nullable();
            $table->string('name')->nullable();
            $table->string('name_url')->nullable();         
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();
            $table->string('access_type')->nullable();
            $table->string('lobby_enabled')->nullable();
            $table->text('lobby_description')->nullable();
            $table->string('registration_enabled')->nullable();
            $table->string('status')->nullable();
            $table->string('timezone')->nullable();
            $table->integer('timezone_offset')->nullable();
            $table->integer('paid_enabled')->nullable();
            $table->integer('automated_enabled')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->integer('type')->nullable();
            $table->string('permanent_room')->nullable();
            $table->string('ccc')->nullable();
            $table->json('access_role_hashes')->nullable();
            $table->string('room_url')->nullable();
            $table->string('phone_presenter_pin')->nullable();
            $table->string('phone_listener_pin')->nullable();
            $table->string('embed_room_url')->nullable();
            $table->string('widgets_hash')->nullable();
            $table->json('recorder_list')->nullable();
            $table->json('settings')->nullable();
            $table->json('autologin_hashes')->nullable();
            $table->string('autologin_hash')->nullable(); 
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conferencesInactive');
    }
}
