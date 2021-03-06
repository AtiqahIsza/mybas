<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusStandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_stand', function (Blueprint $table) {
            $table->id();
            $table->string('altitude', 16)->nullable();
            $table->string('description')->nullable();
            $table->string('latitude', 16);
            $table->string('longitude', 16);
            $table->unsignedSmallInteger('sequence')->nullable();
            $table->string('radius', 10);
            $table->unsignedBigInteger('route_id')->nullable()->index('FKA82FC557367987EA');

            $table->foreign(['route_id'], 'FKA82FC557367987EA')->references(['id'])->on('route')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_stand');
    }
}
