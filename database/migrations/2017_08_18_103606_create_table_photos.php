<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flat_id')->nullable()->unsigned()->default(null);
            $table->integer('galary_id')->nullable()->unsigned()->default(null);

            $table->string('image');
            $table->timestamps();

            $table->foreign('galary_id')->references('id')->on('galaries')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('photos');
    }
}
