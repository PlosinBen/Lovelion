<?php

namespace App\Service;

use App\Repository\Statement\StatementFuturesRepository;

class StatementService
{
    private StatementFuturesRepository $statementFuturesRepository;

    public function __construct(StatementFuturesRepository $statementFuturesRepository)
    {
        $this->statementFuturesRepository = $statementFuturesRepository;
    }

    public function getFuturesList($filter)
    {
        return $this->statementFuturesRepository
            ->perPage(24)
            ->fetchPagination($filter);
    }
}