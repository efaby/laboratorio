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
/*
    public function tipousuario()
    {
        return $this->belongsTo('App\TipoUsuario','tipousuarios_id','id');
    } */

    public function roles()
    {
      return $this->belongsToMany(TipoUsuario::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
          return $this->hasAnyRole($roles) || 
                 abort(403, 'permission denied.');
      }
      return $this->hasRole($roles) || 
             abort(403, 'permission denied.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
      return null !== $this->roles()->whereIn('nombre', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
      return null !== $this->roles()->where('nombre', $role)->first();
    }
}
