<?php

namespace App\Repository\Investment;

use App\Models\Investment\InvestmentAccounting;
use App\Repository\Repository;

class InvestmentAccountingRepository extends Repository
{
    public function __construct(InvestmentAccounting $investmentAccounting)
    {
        $this->Model = $investmentAccounting;
    }
}
