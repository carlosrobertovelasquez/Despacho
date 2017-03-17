<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class Ticket extends Model
{
    protected $table='tickets';
     protected $fillable =['ticket','preparador','estado','cant_pedido','fecha_inicio','fecha_fin','usuario_creacion','usuario_estado','fecha_inicio_preparacion','fecha_fin_preparacion'] ;
           
            protected $id='ticket';
              public $timestamps = false;






}


