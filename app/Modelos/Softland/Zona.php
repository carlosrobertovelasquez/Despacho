<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.ZONA';
    protected $id='ZONA';
    public $timestamps = false;
}
