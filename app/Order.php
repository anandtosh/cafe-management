<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
    protected $fillable = ['applied_on','resolved_on','current_status','admin_upload',
    'description','uploads','amount','franchise_id','fiscal_id','requestwork_id'];

    public function franchise()
    {
        return $this->belongsTo('App\Franchise', 'franchise_id', 'id');
    }
    public function fiscal()
    {
        return $this->belongsTo('App\Config', 'fiscal_id', 'id');
    }
    public function requestwork()
    {
        return $this->belongsTo('App\Requestwork', 'requestwork_id', 'id');
    }
    public function scopeFiscal($query)
    {
        return $query->where('fiscal_id',session('fiscal_id'));
    }
    public function scopeFranchisefil($query)
    {
        return $query->where('franchise_id',session('franchise_id'));
    }

}
