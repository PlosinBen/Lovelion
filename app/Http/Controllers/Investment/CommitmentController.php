<?php

namespace App\Http\Controllers\Investment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommitmentController extends Controller
{


    public function __construct()
    {
        $this->pushBreadcrumbsNode('投資');
    }

    public function index(Request $request)
    {
        $user = $request->user();

        return $this
            ->pushBreadcrumbsNode('歷史權益')
            ->view('investment.commitment.index', [

        ]);
    }
}
