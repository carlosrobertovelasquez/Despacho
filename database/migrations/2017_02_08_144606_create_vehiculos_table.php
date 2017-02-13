<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->string('modelo');
            $table->decimal('kinicial');
            $table->decimal('kfinal');
            $table->string('estado');
            $table->string('ano');
            $table->string('propio');
            $table->string('combustible');
            $table->string('create_user');
            $table->string('update_user');           
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
           Schema::dropIfExists('vehiculos');
    }
}
