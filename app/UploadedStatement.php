<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedStatement extends Model
{
    protected $guarded = [];

    protected $connection = 'mysql';

    public function filename()
    {
        return $this->belongsTo(UploadedFile::class,'uploaded_file_id','id');
    }
}
