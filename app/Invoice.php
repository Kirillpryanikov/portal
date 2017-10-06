<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $collection='invoices';

    protected $primaryKey='_id';
}
