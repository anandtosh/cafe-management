<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'works';

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
    protected $fillable = ['name','charge','bank_charge','max_discount_percent','min_days','max_days'];

    
}
