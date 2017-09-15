<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detalleorden extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detalleorden';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','orden_id','examens_id'];

    public function examan()
    {
        return $this->belongsTo('App\Examan','examens_id','id');
    }

    public function orden()
    {
        return $this->belongsTo('App\Orden','orden_id','id');
    }

}
