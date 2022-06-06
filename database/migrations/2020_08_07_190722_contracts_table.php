<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('company_id')->nullable();

            $table->unsignedBigInteger('client_id')->nullable();

            $table->unsignedBigInteger('truck_id')->nullable();

            $table->string('services')->nullable();
            $table->string('collect')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
