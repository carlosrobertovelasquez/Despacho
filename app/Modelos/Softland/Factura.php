<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.FACTURA';
    /*
     protected $fillable =['FACTURA','FECHA','CLIENTE_ORIGEN','EMBARCAR_A','TOTAL_FACTURA','CONDICION_PAGO'] ;
    */

    protected $id='FACTURA';
    public $timestamps = false;







    public function scopeName($query,$name)
    {
        if(trim($name) !=""){
          return $query->where('EMBARCAR_A',"LIKE" , "%$name%");
        }
        return $query;

    }






}
