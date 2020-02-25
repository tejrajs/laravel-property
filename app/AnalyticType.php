<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalyticType extends Model
{
    //
    protected $table = 'analytic_types';

    public function analytics(){
        return $this->hasMany('App\PropertyAnalytic', 'analytic_type_id', 'id');
    }
}
