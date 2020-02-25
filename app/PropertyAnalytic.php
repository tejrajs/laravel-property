<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAnalytic extends Model
{
    //
    protected $table = 'property_analytics';

    public function property(){
        return $this->hasOne('App\Property', 'id', 'property_id');
    }

    public function type(){
        return $this->hasOne('App\AnalyticType', 'id', 'analytic_type_id');
    }
}
