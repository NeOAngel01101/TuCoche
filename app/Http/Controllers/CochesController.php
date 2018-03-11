<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCocheAjaxRequest;
use App\User;
use App\Coche;
use App\Http\Requests\CreateCocheRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CochesController extends Controller
{
    /**
     * Método que muestra la información de un mensaje. Utiliza Route Binding
     * para coneguir el Ccoche facilitado por el parámetro.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Coche $coches)
    {
        $coches = Coche::orderBy('created_at', 'desc')->paginate(7);

        return view('coche.listacoches', [
            'coches' => $coches
        ]);
    }

    public function showtipos($tipo){
        $users = User::where('tipo', $tipo)->pluck('id')->toArray();
        $coches = Coche::whereIn('user_id', $users)->latest()->paginate(7);

        return view('coche.listacoches', [
            'coches' => $coches ,
        ]);
    }

    /**
     * Método para mostrar el formulario de alta de una nuevo mensaje Chusqer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('coche.create');
    }

    public function vercochescreados(Coche $coches)
    {
        $user = Auth::user();
        $coches = $user->coches()->latest()->paginate(10);

        return view('coche.cochescreados',[
                'coches' => $coches
            ]
        );
    }

    public function detalle($id)
    {
        $coche = Coche::find($id);

        return view('coche.cochedetail', [
            'coche' => $coche
        ]);
    }

    /**
     * Guarda en la base de datos la información facilitada para un nuevo mensaje.
     * Utiliza la definición personalizada de un Request para validar los datos.
     *
     * @param CreateCocheRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCocheRequest $request){
        $user = $request->user();


        Coche::create([
            'user_id'       => $user->id,
            'nombre'        => $request->input('nombre'),
            'marca'         => $request->input('marca'),
            'tipo'          => $request->input('tipo'),
            'year'          => $request->input('year'),
            'repostaje'     => $request->input('repostaje'),
            'kilometros'    => $request->input('kilometros'),
            'cv'            => $request->input('cv'),
            'localidad'     => $request->input('localidad'),
            'cambio'        => $request->input('cambio'),
            'descripcion'   => $request->input('descripcion'),
            'precio'        => $request->input('precio'),
            'fichatecnica'  => $request->input('fichatecnica'),
            'imagen1'       => $request->input('imagen1'),
        ]);

        return redirect('/administrar');
    }

    public function edit($id){
        $coche = Coche::find($id);

        return view('coche.edit',[
            'coche' => $coche,
        ]);
    }

    public function update(CreateCocheRequest $request, $id){
        $coche = Coche::find($id);


        $coche->update([
            'nombre'        => $request->input('nombre'),
            'marca'         => $request->input('marca'),
            'tipo'          => $request->input('tipo'),
            'year'          => $request->input('year'),
            'repostaje'     => $request->input('repostaje'),
            'kilometros'    => $request->input('kilometros'),
            'cv'            => $request->input('cv'),
            'localidad'     => $request->input('localidad'),
            'cambio'        => $request->input('cambio'),
            'descripcion'   => $request->input('descripcion'),
            'precio'        => $request->input('precio'),
            'fichatecnica'  => $request->input('fichatecnica'),
            'imagen1'       => $request->input('imagen1'),
        ]);

        return redirect("/administrar");
    }


    public function deleteCoche($id)
    {
        $coche = Coche::find($id)->delete();

        return  redirect('/administrar');
    }
}
