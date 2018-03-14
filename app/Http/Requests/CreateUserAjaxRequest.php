<?php
namespace App\Http\Requests;

use App\Http\Requests\CreateUserRequest;
use \Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class CreateUserAjaxRequest extends CreateUserRequest
{
    public function rules()
    {
        $rules = array();
        if($this->exists('tipo')){
            $rules['tipo'] = $this->validarTipo();
        }
        if($this->exists('username')) {
            $rules['username'] = $this->validarUsername();
        }
        if($this->exists('name')){
            $rules['name'] = $this->validarName();
        }
        if($this->exists('apellido')) {
            $rules['apellido'] = $this->validarApellido();
        }
        if($this->exists('email')){
            $rules['email'] = $this->validarEmail();
        }
        if($this->exists('password')){
            $rules['password'] = $this->validarPassword();
        }
        return $rules;
    }

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'tipo' => $errors->get('tipo'),
            'username' => $errors->get('username'),
            'name' => $errors->get('name'),
            'apellido' => $errors->get('apellido'),
            'email' => $errors->get('email'),
            'password' => $errors->get('password'),
        ]);
        throw new ValidationException($validator, $response);
    }
}