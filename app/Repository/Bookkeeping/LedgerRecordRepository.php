<?php

namespace App\Repository\Bookkeeping;

use App\Models\Bookkeeping\LedgerRecord;
use App\Repository\Repository;

class LedgerRecordRepository extends Repository
{
    public function __construct(LedgerRecord $ledgerRecord)
    {
        $this->Model = $ledgerRecord;
    }
}
