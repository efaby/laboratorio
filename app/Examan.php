<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examan extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'examens';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','tipoexamens_id','muestras_id','nombre','plantilla','precio_normal','precio_laboratorio','precio_clinica','estado'];

    public function tipoexaman()
    {
        return $this->belongsTo('App\TipoExaman','tipoexamens_id','id');
    }

    public function muestra()
    {
        return $this->belongsTo('App\Muestra','muestras_id','id');
    }
    public function detalleorden()
    {
        return $this->hasMany('App\Detalleorden' , 'id', 'examens_id' );
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    

}
