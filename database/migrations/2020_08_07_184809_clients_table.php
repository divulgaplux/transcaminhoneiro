<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('company_id')->nullable();

            $table->string('name')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('cnh')->nullable();
            $table->string('cnh_state')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
