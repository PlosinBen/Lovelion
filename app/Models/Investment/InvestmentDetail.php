<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Model;

class InvestmentDetail extends Model
{
    protected $table = 'investment_detail';

    protected $fillable = [
        'date',
        'investment_user_id',
        'type',
        'amount',
        'note',
    ];

    protected $dates = [
        'date'
    ];
}
