<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    protected $fillable = ['nombre','celular','surtidor'];

    	public function getRouteKeyName()
	{
		return 'slug_proveedor';
	} 

		    public function entradafactura()
	{
		return $this->hasMany('App\entradafactura');
	} 
 
}
