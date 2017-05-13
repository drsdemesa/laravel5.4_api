<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'item', 'item_no', 'item_amt', 'received_amt', 'outstanding_bal'
    ];
}
