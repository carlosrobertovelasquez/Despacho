<?php

namespace App\Modelos\Softland;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected  $connection= 'softland';
    protected  $table='DRO_UNI.CLIENTE';
   // protected $id='CLIENTE';
    protected $primaryKey='CLIENTE';
    public $timestamps = false;

  public function factura()
  {
    return $this->hasmany(Factura::class);

  }

}
