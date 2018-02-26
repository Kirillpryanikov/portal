<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedStatement extends Model
{
    protected $guarded = [];

    protected $connection = 'mysql';
}
