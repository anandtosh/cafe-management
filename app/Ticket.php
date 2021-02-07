<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tickets';

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
    protected $fillable = ['description','attatchment','status','admin_remark','admin_attatchment','sale_id','franchise_id','user_id'];

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sale_id', 'id');
    }
    public function franchise()
    {
        return $this->belongsTo('App\Franchise', 'franchise_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
}
