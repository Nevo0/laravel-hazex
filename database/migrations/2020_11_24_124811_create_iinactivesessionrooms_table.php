<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIinactivesessionroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iinactivesessionrooms', function (Blueprint $table) {
            $table->id();
            $table->integer('id_room');
            $table->foreignId('iinactivesessions_idsession')->constrained()->onDelete('cascade');
            $table->string('total_visitors')->nullable();
            $table->string('max_visitors')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('iinactivesessionrooms');
    }
}
