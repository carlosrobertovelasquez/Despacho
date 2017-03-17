<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fletes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flete')->unique();
            $table->string('vehiculo_id')->usigned();
            $table->string('motorista_id')->usigned();
            $table->decimal('montototal',28,8);
            $table->decimal('numerofacturas');
            $table->dateTime('fecha');
            $table->dateTime('fechahorasalida');
            $table->dateTime('fechahorallegada');
            $table->string('estado');
            $table->decimal('kinicial',28,0);
            $table->decimal('kfinal',28,0);
            $table->string('usuariocreacion');
            $table->string('usuariosalida');
            $table->string('usuariollegada');
            $table->timestamps();
            $table->foreign('motorista_id')->references('id')->on('Motoristas');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fletes');
    }
}
