<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ledger extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ledgers';

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
    protected $fillable = ['name','contact','address','bank_ac_no','bank_ifsc','bank_branch',
        'group_id','franchise_id','user_id','fiscal_id'];

    public function group()
    {
        return $this->belongsTo('App\Config', 'group_id', 'id');
    }
    public function fiscal()
    {
        return $this->belongsTo('App\Config', 'fiscal_id', 'id');
    }
    public function franchise()
    {
        return $this->belongsTo('App\Franchise', 'franchise_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function sales()
    {
        return $this->hasMany('App\Sale', 'client_id', 'id');
    }
    public function receipts()
    {
        return $this->hasManyThrough('App\Receipt','App\Sale','client_id');
    }

    public function scopeFiscal($query)
    {
        return $query->where('fiscal_id',session('fiscal_id'));
    }
    public function scopeFranchise($query)
    {
        return $query->where('franchise_id',session('franchise_id'));
    }


}
