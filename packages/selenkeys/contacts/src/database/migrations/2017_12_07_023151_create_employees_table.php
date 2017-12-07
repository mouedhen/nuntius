<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned();
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('job_id')->unsigned()->nullable();

            $table->integer('contact_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('employees', function (Blueprint $table) {

            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->foreign('department_id')
                ->references('id')->on('contacts')
                ->onDelete('cascade');

            $table->foreign('job_id')
                ->references('id')->on('jobs')
                ->onDelete('cascade');

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
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('company_id');
            $table->dropForeign('department_id');
            $table->dropForeign('job_id');
            $table->dropForeign('contact_id');
        });

        Schema::dropIfExists('employees');
    }
}
