<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $guarded = [];

    protected $connection = 'mysql';

    public function uploaded_statements()
    {
        return $this->hasMany(UploadedStatement::class);
    }
}
