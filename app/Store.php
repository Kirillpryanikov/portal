<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'users_store_messages';

    protected $fillable = ['user_id','date_time','message','field_name'];
}
