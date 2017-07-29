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
    protected $fillable = ['nombre', 'estado'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
