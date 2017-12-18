<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('vehicule_brand_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('vehicules_models', function (Blueprint $table) {
            $table->foreign('vehicule_brand_id')
                ->references('id')->on('vehicules_brands')
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
        Schema::table('vehicules_models', function (Blueprint $table) {
            $table->dropForeign('vehicule_brand_id');
        });
        Schema::dropIfExists('vehicules_models');
    }
}
