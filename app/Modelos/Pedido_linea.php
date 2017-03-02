<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Pedido_linea extends Model
{
    //
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.PEDIDO_LINEA';
    protected  $id='PEDIDO';
         public $timestamps = false;
         

 public function pedido_linea(){
     // belongsto --- Pertenece a
     return $this->belongsto('App\Modelos\Pedido');
 }

}
