<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'receipts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    protected $attributes =[
        'remark' => 'Amount Received First Part/Complete',
    ];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['remark','amount','sale_id','ledger_id'];

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sale_id', 'id');
    }
    public function ledger()
    {
        return $this->belongsTo('App\Ledger', 'ledger_id', 'id');
    }

}
