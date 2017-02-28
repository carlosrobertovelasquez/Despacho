<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class TCarga_Pedido extends Model
{
     protected $fillable =[
     'pedidos',
     'estado',
     'autorizado',
     'fecha_hora_pedido',
     'fecha_hora_aprobacion',
     'Usuario',
     'Vendedor',
     'Nombre_Vendedor',
     'Cliente',
     'Nombre_Cliente',
     'Direccion_Cliente',
     'Total_a_Facturar',
     'Fecha_hora_carga',
     'fecha_hora_ticket',
     'num_Ticket',
     'fecha_hora_Flete',
     'num_Flete'
          ] ;
            public $timestamps = false;
}
