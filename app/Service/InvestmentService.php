<?php

namespace App\Service;

use App\Repository\Investment\InvestmentAccountingRepository;
use App\Repository\Investment\InvestmentDetailRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class InvestmentService
{
    private InvestmentAccountingRepository $investmentAccountingRepository;
    private InvestmentDetailRepository $investmentDetailRepository;

    public function __construct(
        InvestmentAccountingRepository $investmentAccountingRepository,
        InvestmentDetailRepository $investmentDetailRepository
    ) {
        $this->investmentAccountingRepository = $investmentAccountingRepository;
        $this->investmentDetailRepository = $investmentDetailRepository;
    }

    public function getCommitmentList(array $filter): LengthAwarePaginator
    {
        return $this->investmentAccountingRepository
            ->perPage(20)
            ->fetchPagination($filter);
    }

    public function getCommitment(array $filter)
    {
        return $this->investmentAccountingRepository
            ->fetch($filter);
    }

    public function getDetailByCommitment($commitment)
    {
        return $this->investmentDetailRepository
            ->fetchCommitmentDetail($commitment);
    }
}
