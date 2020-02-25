<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use Uuids;

    protected $table = 'properties';

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'guid';
    }

    public function analytics(){
        return $this->hasMany('App\PropertyAnalytic', 'property_id', 'id');
    }
}
