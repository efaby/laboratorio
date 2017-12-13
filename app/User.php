<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nombres', 'apellidos', 'direccion', 'tipousuarios_id','cedula'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function ordenes()
    {
        return $this->hasMany('App\Orden' , 'user_id', 'id');
    }

    public function tipousuario()
    {
        return $this->belongsTo('App\TipoUsuario','tipousuarios_id','id');
    }
}
