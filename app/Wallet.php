<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Wallet extends Eloquent
{
    protected $collection='wallets';

    protected $connection = 'mongodb';

    protected $primaryKey='_id';
}
