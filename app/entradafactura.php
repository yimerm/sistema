<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entradafactura extends Model
{
    protected $fillable = ['codigo','nombre','total'];

	public function proveedor()
	{
		return $this->belongsTo('App\proveedor','nombre');
	} 
}
