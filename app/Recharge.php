<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recharges';

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
    protected $fillable = ['amount','franchise_id'];

    public function franchise()
    {
        return $this->belongsTo('App\Franchise', 'franchise_id', 'id');
    }
    
}
