<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.RUTA';
    protected $id='RUTA';
    public $timestamps = false;
}
