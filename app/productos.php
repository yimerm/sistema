<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
	protected $fillable = ['codigo','nombre','categoria','precio_ini','porcentaje','precio_final','cantidades','imagenprod'];
        	public function getRouteKeyName()
	{
		return 'slug_pro';
	} 
}
