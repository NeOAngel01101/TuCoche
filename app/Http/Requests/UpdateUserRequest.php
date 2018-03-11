<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateUserRequest extends FormRequest
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
        $path = $this->path();
        if (strpos($path, 'account')){
            $rules = [
                'username' => 'nullable|string|max:30|unique:users',
                'name' => 'nullable|string|max:30',
                'apellido' => 'nullable|string|max:120',
                'telefonomovil' => 'nullable|string|max:9',
                'tipo' =>       'nullable|string|max:11',
                'web' => 'nullable|string|max:255',
                'descripcion' => 'nullable|string|max:300',
                'email'=> 'nullable|email|max:100|unique:users'
            ];
        }elseif (strpos($path, 'password')){
            $rules = [
                'current_password' => 'required|string|min:4',
                'password' => 'required|string|min:4|confirmed',
            ];
        }elseif (strpos($path, 'avatar')){
            $rules = [
                'avatar' => 'required',
            ];
        }
        return $rules;

    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'username.string' => 'Introduzca un nick correcto ',
            'username.unique' => 'Este nick no esta disponible ',
            'username.max' => 'A superado el maximo de caracteres disponibles para el nick',
            'name.string' => 'Introduzca un nombre correcto ',
            'name.max' => 'A superado el maximo de caracteres disponibles para el nombre',
            'apellido.string' => 'Introduzca un apellido correcto',
            'apellido.max' => 'A superado el maximo de caracteres disponibles para el apellido',
            'telefonomovil.string' => 'Introduzca un telefono correcto',
            'telefonomovil.max' => 'A superado el maximo de caracteres disponibles para el telefono',
            'tipo.string' => 'Introduzca un tipo de usuario correcto ',
            'tipo.max' => 'A superado el maximo de caracteres disponibles para el tipo',
            'web.string' => 'Introduzca una web correcta ',
            'web.max' => 'A superado el maximo de caracteres disponibles para la web',
            'descripcion.string' => 'Introduzca una descripcion correcta ',
            'descripcion.max' => 'A superado el maximo de caracteres disponibles para la descripcion',
            'email.email' => 'Introduzca un email correcto ',
            'email.unique' => 'Este email no esta disponible ',
            'email.max' => 'A superado el maximo de caracteres disponibles para el email',

            'current_password.required' => 'Es obligatorio escribir la antigua contraseña',
            'current_password.min' => 'Se a de poner como minimo 4 caracteres ',
            'password.required' => 'Es obligatorio escribir la nueva contraseña',
            'password.min' => 'Se a de poner como minimo 4 caracteres ',
            'current_password.confirmed' => 'La contraseña no es la misma que la confirmada',

            'avatar.required' => 'Es necesario un avatar.',
        ];
    }
}