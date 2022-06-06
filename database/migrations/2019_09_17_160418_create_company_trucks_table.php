<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_trucks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('company_id');

            $table->unsignedBigInteger('truck_id');

            $table->string('board')->nullable();
            $table->string('renavam')->nullable();
            $table->string('brand')->nullable();
            $table->string('color')->nullable();
            $table->string('city')->nullable();
            $table->string('chassi')->nullable();
            $table->string('model')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('technology')->nullable();
            $table->string('year_of_manufacture')->nullable();
            $table->string('year_of_model')->nullable();

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
        Schema::dropIfExists('company_trucks');
    }
}
