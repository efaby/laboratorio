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
	protected $fillable = ['id','fecha_factura'];

	public function ordenes()
	{
		return $this->hasMany('App\Orden' , 'id', 'factura_id');
	}

	use SoftDeletes;
	protected $dates = ['deleted_at'];

}