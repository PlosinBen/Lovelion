<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
        'date',
    ];

    public function scopePeriod($query, $value)
    {
        if (!$value instanceof Carbon) {
            $value = Carbon::parse($value);
        }

        return $query->whereBetween('date', [
            $value->startOfMonth()->toDateString(),
            $value->endOfMonth()->toDateString()
        ]);
    }

    public function scopeInvestmentUserId($query, $value)
    {
        if (is_int($value)) {
            $query->where('investment_user_id', $value);
        }

        return $query;
    }
}
