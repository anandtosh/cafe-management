<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sales';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    // protected attribues
    protected $attributes = [
        'status'=> 'DONE',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','contact_number','qty','rate',
    'bank_fee','bank_fee_extra_charge','total','receivable',
    'fiscal_id','user_id','franchise_id','client_id','work_id','received','status'];

    public function fiscal()
    {
        return $this->belongsTo('App\Config', 'fiscal_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function franchise()
    {
        return $this->belongsTo('App\Franchise', 'franchise_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo('App\Ledger', 'client_id', 'id');
    }
    public function work()
    {
        return $this->belongsTo('App\Work', 'work_id', 'id');
    }
    public function receipts()
    {
        return $this->hasMany('App\Receipt');
    }
    public function statuses()
    {
        return $this->hasMany('App\Status');
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
