<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commands';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'value', 'active'];

    
}
