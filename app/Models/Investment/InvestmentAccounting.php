<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class InvestmentAccounting extends Model
{
    public $table = 'investment_account';

    protected $fillable = [
        'period',
        'investment_user_id',
        'deposit',
        'withdraw',
        'profit',
        'transfer',
        'expense',
        'commitment',
    ];

    public function setPeriodAttribute($period)
    {
        if (! $period instanceof Carbon) {
            $period = Carbon::parse($period);
        }

        $this->attributes['period'] = $period->startOfMonth();
    }
}
