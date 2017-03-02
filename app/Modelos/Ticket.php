<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table='tickets';
     protected $fillable =['ticket','preparador','estado','cant_pedido','fecha_inicio','fecha_fin','usuario_creacion','usuario_estado'] ;
            public $timestamps = false;
}
