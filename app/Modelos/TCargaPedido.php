<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class TCargaPedido extends Model
{
     protected $table='tcargapedidos';
     protected $id='pedidos';

public function scopeName($query,$name)
    {
       if(trim($name) !=""){
$query->where('NOMBRE_CLIENTE',"LIKE" , "%$name%");
       }
         
    }


}
