<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Ticket_detalle_producto extends Model
{
    protected $table='tickets_detalle_productos';
    protected $fillable =['ticket','pedido','pedido_linea','bodega','lote','articulo','precio_unitario','cantidad_pedida','cantidad_a_facturar','cantidad_bonificad'] ;
            public $timestamps = false;
}
