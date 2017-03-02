<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Ticket', function (Blueprint $table) { 
            $table->increments('id');
            $table->string('ticket')->unique;
            $table->string('preparador');
            $table->string('estado');
            $table->decimal('cant_peido',10,2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('usuario_creacion');
            $table->string('usuario_estado');
            $table->timestamps();
        });
    }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Ticket', function (Blueprint $table) {
            //
        });
    }
}
