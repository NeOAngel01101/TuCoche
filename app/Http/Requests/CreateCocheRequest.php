<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CreateCocheRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Aquí se especifican las reglas de validación para este Requests
        return [
            'nombre' =>     'required|string|max:40',
            'marca' =>      'required|string|max:20',
            'year' =>       'required|date',
            'repostaje' =>  'required|string|max:10',
            'kilometros' => 'required|integer',
            'cv' =>         'required|integer',
            'localidad' =>  'required|string|max:50',
            'cambio' =>     'required|string|max:20',
            'descripcion'=> 'required|string|max:255',
            'precio' =>     'required|integer',
            'imagen1' =>    'required|string|max:255',
        ];
    }
    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.string' => 'Introduzca el nombre',
            'nombre.max' => 'A superado el maximo de caracteres disponibles para el nombre',
            'marca.required' => 'El campo marca es obligatorio',
            'marca.string' => 'Introduzca la marca',
            'marca.max' => 'A superado el maximo de caracteres disponibles para la marca',
            'year.required' => 'El campo año es obligatorio',
            'year.date' => 'Introduzca una fecha correcta',
            'repostaje.required' => 'El campo repostaje es obligatorio',
            'repostaje.string' => 'Introduzca el tipo de repostaje',
            'repostaje.max' => 'A superado el maximo de caracteres disponibles para repostaje',
            'kilometros.required' => 'El campo kilometros es obligatorio',
            'kilometros.integer' => 'El campo kilometros debe ser numerico',
            'cv.required' => 'El campo cv es obligatorio',
            'cv.integer' => 'El campo cv debe ser numerico',
            'localidad.required' => 'El campo localidad es obligatorio',
            'localidad.string' => 'El campo localidad es incorrecto',
            'localidad.max' => 'A superado el limite de caracteres de una localidad',
            'cambio.required' => 'El campo cambio es obligatorio',
            'cambio.string' => 'Introduzca un cambio correcto',
            'cambio.max' => 'A superado el limite de caracteres de una localidad',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'descripcion.string' => 'Introduzca una descripcion ',
            'descripcion.max' => 'A superado el limite de caracteres de una descripcion',
            'precio.required' => 'El campo precio es obligatorio',
            'precio.integer' => 'Introduzca un precio correcto ',
            'imagen1.required' => 'El campo imagen es obligatorio',
            'imagen1.string' => 'Introduzca una imagen ',
            'imagen1.max' => 'A superado el limite de caracteres disponible para una imagen',
        ];
    }
}