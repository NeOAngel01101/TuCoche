<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name','apellido', 'telefonomovil', 'tipo' , 'web' , 'descripcion', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function coches(){
        return $this->hasMany(Coche::class);
    }
    public function profile(){
        return $this->hasOne(User::class);
    }

    public function getImageAttribute($image)
    {
        if( starts_with($image, "https://")){
            return $image;
        }
        return  Storage::disk('public')->url($image);
    }
}
