<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FleteItem extends Model
{
	protected  $table='dbo.fleteitems';
    protected $fillable =['flete',
                       'flete_id',
                       'factura',
                       'fecha',
                       'cliente',
                       'nombre',
                       'total',
                       'condicionpago','estado',];

    public $timestamps = false;                   



}
