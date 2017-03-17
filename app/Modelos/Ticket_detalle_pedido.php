<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Ticket_detalle_pedido extends Model
{
    protected $table='tickets_detalle_pedidos';
    protected $fillable =['id_ticket','pedido','cliente','nombre','direccion','monto','estado','vendedor','nombre_vendedor','nota'] ;
            public $timestamps = false;
}
