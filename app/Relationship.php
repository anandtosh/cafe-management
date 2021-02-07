<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'relationships';

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
    protected $fillable = ['name','model','table','fk_this','rk_that','ondelete','type','module_id'];

    
}