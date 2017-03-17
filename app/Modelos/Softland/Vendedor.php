<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.VENDEDOR';
    protected $id='VENDEDOR';
    public $timestamps = false;
}
