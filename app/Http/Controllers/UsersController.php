<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\HttpException;
use App\Conversation;
use App\PrivateMessage;



class UsersController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware( function($request, $next){
            $this->user = auth()->user();
            return $next($request);
        });
        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function buscar($username)
    {
        $user = User::where('username', $username)->first();
        $coches = $user->coches()->latest()->paginate(10);

        if(Auth::user()){
            $conversation = Conversation::conversationId(Auth::user(), $user);
        }else{
            $conversation = null;
        }

        return view(
            'users.list', [
                'coches' => $coches,
                'user' => $user,
                'conversation'  => $conversation,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('users.edit', ['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();
        $user = Auth::user();
        if( strpos($path, 'account')) {
            $data = array_filter($request->all());
            $user = User::findOrFail($this->user->id);
            $user->fill($data);
        }elseif ( strpos($path, 'password') ){
            if( ! Hash::check($request->get('current_password'), $this->user->password ) ){
                return redirect()->back()->with('error', 'La constraseña actual no es correcta');
            }
            if( strcmp($request->get('current_password'), $request->get('password')) == 0){
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }
            $this->user->password = bcrypt($request->get('password'));
        }
        $user->save();
        return redirect()
            ->route('profile.account')
            ->with('exito', 'Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $coches = $user->coches()->delete();
        $this->user->delete();
        return redirect()->route('home');
    }

    public function sendPrivateMessage($username, Request $request)
    {
        $user = $this->buscar($username);
        $me = $request->user();
        $message = $request->input('message');
        $conversation = Conversation::between($me, $user);
        $private_message = PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'content' => $message,
        ]);
        return redirect('/conversations/'.$conversation->id);
    }

    public function showConversation(Conversation $conversation)
    {
        if(! $conversation->users()->get()->contains(Auth::user())){
            return redirect()->route('profile');
        }
        return view('users.conversation', [
            'conversation' => $conversation
        ]);
    }


    public function profile()
    {
        return view('users.edit');
    }
}
