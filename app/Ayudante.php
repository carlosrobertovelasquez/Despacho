<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayudante extends Model
{
      protected $fillable=['dui','cod_empleado','nombre','estado'];
        public $timestamps = false;
}
