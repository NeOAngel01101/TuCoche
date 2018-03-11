<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\CreateUserAjaxRequest;
use App\Http\Requests\CreateUserRequest;
use App\User;
use App\Coche;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tipo' =>       'required|string|max:11',
            'username' =>   'required|string|max:30|unique:users',
            'name' =>       'required|string|max:60',
            'apellido' =>   'required|string|max:120',
            'email' =>      'required|email|unique:users',
            'password' =>   'required|min:4|confirmed',
        ],[
            'tipo.required' => 'El campo tipo es obligatorio',
            'tipo.string' => 'Introduzca un tipo correcto',
            'tipo.max' => 'A superado el maximo de caracteres disponibles para el tipo',
            'username.required' => 'El campo nick es obligatorio',
            'username.string' => 'Introduzca el nick',
            'username.max' => 'A superado el maximo de caracteres disponibles para el nick',
            'username.unique' => 'El nick de usuario no está disponible',
            'name.required' => 'El campo Nombre es obligatorio',
            'name.string' => 'Introduzca el nombre',
            'name.max' => 'A superado el maximo de caracteres disponibles para el nombre',
            'apellido.required' => 'El campo apellido es obligatorio',
            'apellido.string' => 'Introduzca un apellido valido',
            'apellido.max' => 'A superado el maximo de caracteres disponibles para el apellido',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Introduzca un email valido',
            'email.unique' => 'El email no está disponible',
            'password.required' => 'El campo password es obligatorio',
            'password.min' => 'El campo password debe tener al menos 4 caracteres',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'tipo' => $data['tipo'],
            'username' => $data['username'],
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
