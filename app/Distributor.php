<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'distributors';

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
    protected $fillable = ['name','address','contact_person','credit_limit','opening',
    'contact_number','email'];


}
