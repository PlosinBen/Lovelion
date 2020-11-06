<?php

namespace App\Repository\Investment;

use App\Models\Investment\FuturesStatement;
use App\Repository\Repository;

class FuturesStatementRepository extends Repository
{
    public function __construct(FuturesStatement $futuresStatement)
    {
        $this->Model = $futuresStatement;
    }
}
