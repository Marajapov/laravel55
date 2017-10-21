<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFlats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->nullable()->unsigned()->default(null);
            $table->integer('city')->nullable()->default(null);
            $table->integer('region')->nullable()->default(null);
            $table->enum('status', ['live', 'dead'])->nullable()->default('live');

            // prices
            $table->string('price24')->nullable()->default(null);
            $table->string('price_hour')->nullable()->default(null);
            $table->string('price_night')->nullable()->default(null);
            $table->string('price_month')->nullable()->default(null);
            
            $table->string('name')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('phone2')->nullable()->default(null);
            $table->string('phone3')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('street')->nullable()->default(null);
            $table->string('crosses')->nullable()->default(null);
            $table->string('apartment')->nullable()->default(null);
            $table->string('floor')->nullable()->default(null);
            $table->string('total_floors')->nullable()->default(null);
            $table->string('home_number')->nullable()->default(null);

            $table->string('room')->nullable()->default(null);
            $table->string('bed')->nullable()->default(null);
            $table->string('msquare')->nullable()->default(null);
            $table->string('wifi')->nullable()->default(null);

            $table->string('latitude')->nullable()->default(null);
            $table->string('longitude')->nullable()->default(null);
            $table->string('zoom')->nullable()->default(null);

            $table->string('contruct_serial')->nullable()->default(null);
            $table->string('currency')->nullable()->default(null);

            $table->string('main_img')->nullable()->default(null);
            $table->smallInteger('star')->nullable()->unsigned()->default(null);
            $table->boolean('published')->nullable()->default(false);

            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
