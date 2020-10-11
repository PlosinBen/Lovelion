<?php

namespace App\Models\Bookkeeping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerRecordAttach extends Model
{
    use HasFactory;

    protected $table = 'ledger_record_attach';

    protected $fillable = [
        'ledger_record_id',
        'name',
        'amount',
    ];
}
