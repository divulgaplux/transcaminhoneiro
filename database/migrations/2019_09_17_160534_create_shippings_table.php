<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('truck_id')->nullable();

            $table->string('client')->nullable();
            $table->string('receiver')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('cellphone')->nullable();

            $table->string('origin');
            $table->string('destination');
            $table->float('weight');
            $table->float('value_suggested');

            $table->float('insurance_price')->nullable();
            $table->float('distance')->nullable();

            // $table->string('company_truck_id');
            // $table->string('truck_id');
            // $table->string('status');
            // $table->string('have_insurance');

            $table->unsignedBigInteger('company_truck_id')->nullable();

            $table->enum('status', ['REQ', 'ACP', 'REJ', 'FIN', 'CAN'])->default('REQ');

            $table->boolean('have_insurance')->default(FALSE);
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
        Schema::dropIfExists('shippings');
    }
}
