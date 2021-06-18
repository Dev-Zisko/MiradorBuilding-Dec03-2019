<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes');
            $table->string('año');
            $table->string('monto');
            $table->string('total');
            $table->string('reserva');
            $table->string('fondo');
            $table->string('newfondo');
            $table->string('tasa');
            $table->string('dolares');
            $table->string('fechavencimiento');
            $table->string('transferencia')->nullable();
            $table->string('fechatrans')->nullable();
            $table->string('estado');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('bills');
    }
}
