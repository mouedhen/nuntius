<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->increments('id');

            $table->string('label');
            $table->integer('label_id')->unsigned();
            $table->string('license_plate', 25)->unique();
            $table->string('chassis_number')->unique();
            $table->date('acquisition_date')->nullable();
            $table->integer('power')->nullable();
            $table->integer('horse_power')->nullable();
            $table->string('color')->nullable();
            $table->integer('seats_number')->nullable();
            $table->enum('fuel_type', ['gasoline', 'diesel', 'electric', 'hybrid', 'gas']);
            $table->enum('state', ['good', 'medium', 'bad', 'off']);

            $table->integer('vehicule_model_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('vehicules', function (Blueprint $table) {
            $table->foreign('vehicule_model_id')
                ->references('id')->on('vehicules_models')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('vehicules', function (Blueprint $table) {
            $table->dropForeign('vehicule_model_id');
        });
        Schema::dropIfExists('vehicules');
    }
}
