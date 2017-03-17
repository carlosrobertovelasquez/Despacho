<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flete extends Model
{
	 protected $fillable =['flete','vehiculo_id','motorista_id','montototal','numerofacturas','fecha','fechahorasalida','fechahorallegada','estado','kinicial','kfinal','usuariocreacion','usuariosalida','usuariollegada'] ;
            public $timestamps = false;
    }
