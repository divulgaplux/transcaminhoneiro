<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');

            $table->unsignedBigInteger('shipping_id');

            $table->float('value');
            $table->float('time_approximate')->nullable();
            $table->string('observation')->nullable();
            $table->dateTime('date');
            $table->string('status')->nullable();
            $table->dateTime('date_acceptation')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
