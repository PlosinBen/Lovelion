<?php

namespace App\Repository\Bookkeeping;

use App\Models\Bookkeeping\Ledger;
use App\Repository\Repository;

class LedgerRepository extends Repository
{
    public function __construct(Ledger $ledger)
    {
        $this->Model = $ledger;
    }
}
