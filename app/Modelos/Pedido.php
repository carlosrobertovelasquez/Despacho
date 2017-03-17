<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.PEDIDO';
    protected $id='PEDIDO';
    public $timestamps = false;

       

        public function pedido_linea(){
           //hasmany -Tiene muchas
            return $this->hasmany('App\Modelos\Pedido_linea');
        }
}
