<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Coche;
use Illuminate\Support\Facades\Hash;
use View;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('users.perfil', [
            'user' => $user
        ]);
    }

    public function borrarUsuario($id,Coche $coches){


        $user = User::find($id);
        $coches = $user->coches()->delete();
        $user->delete();


        return  redirect('/');
    }

    public function actualizarpassword(UpdatePasswordRequest $request)
    {
        $path = $request->path();
        $user = Auth::user();


        if( strpos($path, 'account')) {
            $data = array_filter($request->all());
            $user = User::findOrFail($user->id);
            $user->fill($data);
        }elseif ( strpos($path, 'password') ){
            if( ! Hash::check($request->get('current_password'), $user->password ) ){
                return redirect()->back()->with('error', 'La constraseña actual no es correcta');
            }
            if( strcmp($request->get('current_password'), $request->get('password')) == 0){
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();

        return redirect()
            ->route('users.perfil')
            ->with('exito', 'Datos actualizados');
    }

}