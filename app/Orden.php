<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orden';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pacientes_id','user_id','nombre','fecha_emision','fecha_entrega','abono','tipo_pago','total','iva','iva','estado','subtotal', 'descuento', 'cliente_id', 'nombre_medico', 'usuario_atiende', 'atendido'];

    public function paciente()
    {
        return $this->belongsTo('App\Paciente','pacientes_id','id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente','cliente_id','id');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
