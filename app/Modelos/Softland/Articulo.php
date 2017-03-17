<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.ARTICULO';
    protected $id='ARTICULO';
    public $timestamps = false;
}
