<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';

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
    protected $fillable = ['name', 'model', 'controller', 'views', 'migration', 'menu','modelpath',
'controllerpath','viewspath','primary','route','routegroup','softdelete'];

    public function relationships(){
        return $this->hasMany('App\Relationship');
    }

}
