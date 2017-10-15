<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Codigosorden extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'codigosorden';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula', 'fecha', 'codigo', 'orden_id'];

    public function orden()
    {
    	return $this->belongsTo('App\Orden','orden_id','id');
    }
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
