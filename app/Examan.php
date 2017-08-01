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
    protected $fillable = ['nombre', 'estado', 'tipoexamens_id','muestras_id'];

    public function tipoexaman()
    {
        return $this->belongsTo('App\TipoExaman','tipoexamens_id','id');
    }

    public function muestra()
    {
        return $this->belongsTo('App\Muestra','muestras_id','id');
    }
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    

}
