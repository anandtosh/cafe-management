<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expenses';

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
    protected $fillable = ['type','description','amount','franchise_id','fiscal_id'];

    public function franchise()
    {
        return $this->belongsTo('App\Franchise', 'franchise_id', 'id');
    }
    public function fiscal()
    {
        return $this->belongsTo('App\Config', 'fiscal_id', 'id');
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
