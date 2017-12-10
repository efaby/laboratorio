<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'factura';

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','fecha_factura', 'cliente_id', 'fecha_inicio', 'fecha_fin', 'precio','num_factura'];

	public function ordenes()
	{
		return $this->hasMany('App\Orden' , 'id', 'factura_id');
	}

	public function cliente()
    {
        return $this->belongsTo('App\Cliente','cliente_id','id');
    }

	use SoftDeletes;
	protected $dates = ['deleted_at'];

}