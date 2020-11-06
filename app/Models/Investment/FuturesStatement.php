<?php

namespace App\Models\Investment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class FuturesStatement extends Model
{
    protected $table = 'futures_statement';

    protected $fillable = [
        'period',
        'commitment',
        'open_interest',
        'profit',
        'real_commitment',
        'net_commitment',
        'distribution',
        'note',
    ];

    public function setPeriodAttribute($period)
    {
        if (!$period instanceof Carbon) {
            $period = Carbon::parse($period);
        }

        $this->attributes['period'] = $period->endOfMonth();
    }
}
