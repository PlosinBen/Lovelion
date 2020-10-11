<?php

namespace App\Service;

use App\Repository\Bookkeeping\LedgerRepository;
use Illuminate\Support\Collection;

class BookkeepingService
{
    private LedgerRepository $LedgerRepository;

    public function __construct(LedgerRepository $ledgerRepository)
    {
        $this->LedgerRepository = $ledgerRepository;
    }

    public function getLedgerAll($userId, $filter = [])
    {
        $filter['userId'] = $userId;

        return $this->LedgerRepository
            ->with('LedgerRecord')
            ->fetch($filter)
            ->map(function($row) {
                $row->expenses = $row->LedgerRecord
                    ->where('total', '<', 0)
                    ->sum('total');

                return $row;
            });
    }

    public function getLedgerList($userId, $filter = [])
    {
        $filter['userId'] = $userId;

        $data = $this->LedgerRepository
            ->with('LedgerRecord')
            ->fetchPagination($filter);


        dd($data);


            $data->map(function($row) {
                $row->expenses = $row->LedgerRecord
                    ->where('total', '<', 0)
                    ->sum('total');

                return $row;
            });


    }

    public function createLedger($userId, Collection $columns)
    {
        $this->LedgerRepository
            ->create(
                $userId,
                $columns->get('name'),
                $columns->get('currency_code')
            );
    }
}
