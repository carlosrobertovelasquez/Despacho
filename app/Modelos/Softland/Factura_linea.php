<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Factura_linea extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.FACTURA_LINEA';
    protected $id='FACTURA';
    public $timestamps = false;
}
