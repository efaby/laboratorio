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
    protected $fillable = ['pacientes_id','user_id','nombre','fecha_emision','fecha_entrega','abono','tipo_pago','total','iva','iva','estado','subtotal', 'descuento'];

    public function paciente()
    {
        return $this->belongsTo('App\Paciente','pacientes_id','id');
    }

    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
