<?php

namespace App\Http\Controllers\Ledger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->pushBreadcrumbsNode('Ledger');
    }

    public function create()
    {
        $this->pushBreadcrumbsNode('Create');


        return $this->view('ledger.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
