<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('particulars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cinPassport', 60)->nullable();
            $table->integer('contact_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('particulars', function (Blueprint $table) {
            $table->foreign('contact_id')
                ->references('id')->on('contacts')
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
        Schema::table('particulars', function (Blueprint $table) {
            $table->dropForeign('contact_id');
        });

        Schema::dropIfExists('particulars');
    }
}
