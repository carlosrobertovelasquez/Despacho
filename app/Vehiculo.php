<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Vehiculo extends Model
{
    protected $fillable=['placa','modelo','estado','kinicial','kfinal','ano','propio','combustible', 'create_user','update_user'];
        public $timestamps = false;
}
