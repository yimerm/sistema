<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeproductosrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categoria'=>'required',
            'codigo'=>'required',
            'nombre'=>'required',
            'precio_ini'=>'required',
            'Porcentaje'=>'required',
            'precio_final'=>'required',
            'cantidades'=>'required',
            'imagenprod'=>'required'
        ];
    }
}
