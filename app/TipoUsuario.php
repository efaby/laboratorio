<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoUsuario extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipousuarios';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'estado'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }

}
