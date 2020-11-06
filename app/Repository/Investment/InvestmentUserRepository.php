<?php

namespace App\Repository\Investment;

use App\Models\Investment\InvestmentUser;
use App\Repository\Repository;

class InvestmentUserRepository extends Repository
{
    public function __construct(InvestmentUser $investmentUser)
    {
        $this->Model = $investmentUser;
    }
}
