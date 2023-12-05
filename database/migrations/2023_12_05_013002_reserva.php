<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bookings',function(Blueprint $table){
            $table->id('id_booking');
            $table->string('dni');
            $table->foreignId('id_room');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('days');
            $table->foreign('dni')->references('dni')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_room')->references('id_room')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::dropIfExists('bookings');
    }
};
