<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 60);
            $table->string('email')->unique();
            $table->smallInteger('country_id')->nullable()->unsigned()->default(null);
            $table->smallInteger('city_id')->nullable()->unsigned()->default(null);
            $table->string('workplace',100);
            $table->smallInteger('language');
            $table->string('password',55);
            $table->enum('role', ['user','manager', 'admin'])->nullable()->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
