<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIinactivesessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iinactivesessions', function (Blueprint $table) {
            $table->id();
            $table->integer('idsession');
            $table->foreignId('iinactives_idcm')->constrained()->onDelete('cascade');
            $table->string('total_visitors')->nullable();
            $table->string('max_visitors')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('attendees')->nullable();
            $table->json('pdf')->nullable();
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
        Schema::dropIfExists('iinactivesessions');
    }
}
