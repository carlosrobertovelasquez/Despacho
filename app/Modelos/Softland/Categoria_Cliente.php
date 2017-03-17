<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Categoria_Cliente extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.CATEGORIA_CLIENTE';
    protected $id='CATEGORIA_CLIENTE';
    public $timestamps = false;
}
