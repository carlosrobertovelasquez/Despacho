<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Condicion_Pago extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.CONDICION_PAGO';
    protected $id='CONDICION_PAGO';
    public $timestamps = false;
}
