<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        $rules = array();

        $rules['tipo'] = $this->validarTipo();
        $rules['username'] = $this->validarUsername();
        $rules['name'] = $this->validarName();
        $rules['apellido'] = $this->validarApellido();
        $rules['email'] = $this->validarEmail();
        $rules['password'] = $this->validarPassword();

        return $rules;
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        $mensajesTipo = $this->mensajesTipo();
        $mensajesUsername = $this->mensajesUsername();
        $mensajesName = $this->mensajesName();
        $mensajesApellido = $this->mensajesApellido();
        $mensajesEmail = $this->mensajesEmail();
        $mensajesPassword = $this->mensajesPassword();
        $mensajes = array_merge(
            $mensajesTipo,
            $mensajesUsername,
            $mensajesName,
            $mensajesApellido,
            $mensajesEmail,
            $mensajesPassword
        );
        return $mensajes;
    }

    protected function validarTipo()
    {
        return 'required|string|max:11';
    }

    protected function mensajesTipo()
    {
        $mensajes = array();
        $mensajes["tipo.required"] = 'El campo tipo es obligatorio';
        $mensajes["tipo.string"] = 'Introduzca un tipo correcto';
        $mensajes["tipo.max"] = 'A superado el maximo de caracteres disponibles para el tipo';
        return $mensajes;
    }

    protected function validarUsername()
    {
        return 'required|string|max:30|unique:users';
    }

    protected function mensajesUsername()
    {
        $mensajes = array();
        $mensajes["username.required"] = 'El campo nick es obligatorio';
        $mensajes["username.string"] = 'Introduzca el nick';
        $mensajes["username.max"] = 'A superado el maximo de caracteres disponibles para el nick';
        $mensajes["username.unique"] = 'El nick de usuario no está disponible';
        return $mensajes;
    }


    protected function validarName()
    {
        return 'required|string|max:60';
    }

    protected function mensajesName()
    {
        $mensajes = array();
        $mensajes["name.required"] = 'El campo Nombre es obligatorio';
        $mensajes["name.string"] = 'Introduzca el nombre';
        $mensajes["name.max"] = 'A superado el maximo de caracteres disponibles para el nombre';
        return $mensajes;
    }

    protected function validarApellido()
    {
        return 'required|string|max:120';
    }

    protected function mensajesApellido()
    {
        $mensajes = array();
        $mensajes["apellido.required"] = 'El campo apellido es obligatorio';
        $mensajes["apellido.string"] = 'Introduzca un apellido valido';
        $mensajes["apellido.max"] = 'A superado el maximo de caracteres disponibles para el apellido';
        return $mensajes;
    }

    protected function validarEmail()
    {
        return 'required|email|unique:users';
    }

    protected function mensajesEmail()
    {
        $mensajes = array();
        $mensajes["email.required"] = 'El campo email es obligatorio';
        $mensajes["email.email"] = 'Introduzca un email valido';
        $mensajes["email.unique"] = 'El email no está disponible';
        return $mensajes;
    }

    protected function validarPassword()
    {
        return 'required|min:3';
    }

    protected function mensajesPassword()
    {
        $mensajes = array();
        $mensajes["password.required"] = 'El campo password es obligatorio';
        $mensajes["password.min"] = 'El campo password tiene que tener minimo 3 caracteres ';
        return $mensajes;
    }

}
