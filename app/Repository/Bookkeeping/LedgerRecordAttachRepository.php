<?php

namespace App\Repository\Bookkeeping;

use App\Models\Bookkeeping\LedgerRecordAttach;
use App\Repository\Repository;

class LedgerRecordAttachRepository extends Repository
{
    public function __construct(LedgerRecordAttach $ledgerRecordAttach)
    {
        $this->Model = $ledgerRecordAttach;
    }
}
