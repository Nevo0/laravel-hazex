<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 15)->after('id');
            $table->string('lastname', 15)->after('username');
            $table->string('firstname', 15)->after('lastname');
            $table->string('contact')->nullable()->after('email');
            $table->string('info')->nullable()->after('email');
            $table->date('birthday')->nullable()->after('info');
            $table->tinyInteger('status')->default(1)->after('birthday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
