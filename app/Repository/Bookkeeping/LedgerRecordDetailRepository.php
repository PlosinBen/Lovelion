<?php

namespace App\Repository\Bookkeeping;

use App\Models\Bookkeeping\LedgerRecordDetail;
use App\Repository\Repository;

class LedgerRecordDetailRepository extends Repository
{
    public function __construct(LedgerRecordDetail $ledgerRecordDetail)
    {
        $this->Model = $ledgerRecordDetail;
    }
}
