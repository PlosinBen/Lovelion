<?php

namespace App\Repository\Statement;

use App\Models\Investment\StatementFutures;
use App\Repository\Repository;

class StatementFuturesRepository extends Repository
{
    public function __construct(StatementFutures $futuresStatement)
    {
        $this->Model = $futuresStatement;
    }
}
