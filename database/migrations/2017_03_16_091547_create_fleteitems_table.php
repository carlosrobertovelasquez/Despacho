<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFleteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleteitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flete');
            $table->string('flete_id')->usigned();
            $table->string('factura');
            $table->dateTime('fecha');
            $table->string('cliente');
            $table->string('nombre');
            $table->decimal('total',28,8);
            $table->string('condicionpago');
            $table->string('estado');
            $table->timestamps();
            $table->foreign('flete_id')->references('id')->on('Fletes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fleteitems');
    }
}
