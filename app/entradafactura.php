<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\proveedor;

class entradafactura extends Model
{
    protected $fillable = ['codigo','nombre','total'];

	public function proveedor()
	{
		return $this->belongsTo('App\proveedor','proveedor');
	} 

	public static function codprove()
    {
    	$proveedores = proveedor::all();
        $select = [];
        foreach($proveedores as $proveedores)
        {
            $select[$proveedores->id] = $proveedores->nombre;
        }
        return $select;
    }
  
}
