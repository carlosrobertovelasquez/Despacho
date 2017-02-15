<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $fillable =['dui','nombre','licencia','tipo_lic','estado'] ;
            public $timestamps = false;
}
