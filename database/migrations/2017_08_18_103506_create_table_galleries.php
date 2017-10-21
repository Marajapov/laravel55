<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGalaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->nullable()->unsigned()->default(null);
            $table->integer('flat_id')->nullable()->unsigned()->default(null);
            $table->string('name');
            $table->text('description');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('flat_id')->references('id')->on('flats')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galaries');
    }
}
