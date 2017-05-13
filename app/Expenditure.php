<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    
    protected $fillable = [
        'exp_item', 'exp_amt', 'spent_by'
    ];
}
