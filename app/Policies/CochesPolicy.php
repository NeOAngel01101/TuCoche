<?php
namespace App\Policies;
use App\User;
use App\Coche;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CochesPolicy
{
    use HandlesAuthorization;
    public function view(User $user, Coche $coche)
    {
        //
    }
    /**
     * Determine whether the user can create chusqers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }
    /**
     * Determine whether the user can update the chusqer.
     *
     * @param  \App\User  $user
     * @param  \App\Chusqer  $chusqer
     * @return mixed
     */
    public function update(User $user, Coche $coche)
    {
        return $user->id == $coche->user_id;
    }
    /**
     * Determine whether the user can delete the chusqer.
     *
     * @param  \App\User  $user
     * @param  \App\Chusqer  $chusqer
     * @return mixed
     */
    public function delete(User $user, Coche $coche)
    {
        return $user->id == $coche->user_id;
    }
}