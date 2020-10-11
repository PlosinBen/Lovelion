<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->pushBreadcrumbsNode('ledger', route('ledger.dashboard'));
    }

    public function index()
    {
        $this->pushBreadcrumbsNode('Dashboard');

        return $this->view('ledger.dashboard');
    }
}
