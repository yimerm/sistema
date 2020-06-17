<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\caregorias;

class productos extends Model
{
	protected $fillable = ['codigo','nombre','categoria','precio_ini','porcentaje','precio_final','cantidades','imagenprod'];
    public function getRouteKeyName()
	{
		return 'slug_pro';
	} 

		    public function categoria()
		{
			return $this->belongsTo('App\caregorias','categoria');
		} 
	public static function codcategoria()
    {
    	$categoria = caregorias::all();
        $select = [];
        foreach($categoria as $categoria)
        {
            $select[$categoria->id] = $categoria->nombre;
        }
        return $select;
    }
}