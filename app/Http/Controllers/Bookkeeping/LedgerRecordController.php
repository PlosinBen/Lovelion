<?php

namespace App\Http\Controllers\Bookkeeping;

use App\Http\Controllers\Controller;
use App\Service\BookkeepingService;

class LedgerRecordController extends Controller
{
    private BookkeepingService $BookkeepingService;

    public function __construct(BookkeepingService $bookkeepingService)
    {
        $this->BookkeepingService = $bookkeepingService;

        $this->pushBreadcrumbsNode('Ledger');
    }

    public function show($id)
    {
        $user = auth()->user();

        $ledgerRecord = $this->BookkeepingService->getLedgerRecord($id);
        if($ledgerRecord->Ledger->user_id != $user->id) {
            return abort(403);
        }

        return $this
            ->pushBreadcrumbsNode($ledgerRecord->Ledger->name, route('bookkeeping.ledger.show', $ledgerRecord->Ledger->id))
            ->pushBreadcrumbsNode('編輯 #' . $ledgerRecord->id)
            ->view('bookkeeping.ledger.editRecord', [
            'ledgerRecord' => $ledgerRecord
        ]);
    }
}