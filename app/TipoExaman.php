<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoExaman extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipoexamens';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'estado'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function examans()
    {
        return $this->hasMany('App\Examan' , 'id', 'tipoexamens_id');
    }

}
