<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TripCall extends Eloquent
{
    protected $collection='trip_calls';

    protected $primaryKey='_id';

    public function trip(){
        return $this->belongsTo('App\Trip', '_id', 'trip_id');
    }
}
