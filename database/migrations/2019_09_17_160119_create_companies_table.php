<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');

            $table->string('documentation');
            $table->string('corporative_name');
            $table->string('email');
            $table->string('fantasy_name')->nullable();
            $table->string('adress');
            $table->string('number');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone')->nullable();
            $table->string('cellphone')->nullable();

            // $table->float('ranking');
            // $table->integer('quatities');

            // $table->boolean('is_truck')->default(FALSE);
            // $table->boolean('is_client')->default(FALSE);
            // $table->boolean('is_recipent')->default(FALSE);
            $table->boolean('is_actived')->default(TRUE);

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
        Schema::dropIfExists('companies');
    }
}
