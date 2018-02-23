<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class City extends Eloquent
{
    protected $collection='cities';

    protected $connection = 'mongodb';

    protected $primaryKey='_id';
}
