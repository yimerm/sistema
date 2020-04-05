<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
	protected $fillable = ['nombre','apellidos','celular','direcion','monto_deuda','imagenusu'];
	public function getRouteKeyName()
	{
		return 'slug';
	} 

}
