<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pacientes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','tipopacientes_id','cedula', 'nombres', 'apellidos', 'direccion', 'telefono', 'estado'];

    public function ordenes()
    {
        return $this->hasMany('App\Orden' , 'id', 'cliente_id');
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}