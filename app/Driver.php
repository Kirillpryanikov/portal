<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Driver extends Eloquent
{
    protected $collection='drivers';

    protected $connection = 'mongodb';

    protected $primaryKey='_id';

}
