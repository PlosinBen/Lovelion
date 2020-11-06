<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Model;

class InvestmentUser extends Model
{
    protected $table = 'investment_user';

    protected $fillable = [
        'name',
        'user_id',
    ];

}
