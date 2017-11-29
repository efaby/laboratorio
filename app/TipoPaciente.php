<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPaciente extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipopacientes';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'estado'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function pacientes()
    {
        return $this->hasMany('App\Paciente' , 'id', 'tipopacientes_id');
    }

    public function clientes()
    {
    	return $this->hasMany('App\Cliente' , 'id', 'tipopacientes_id');
    }
}
