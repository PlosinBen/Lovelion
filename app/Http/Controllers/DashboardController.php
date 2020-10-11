<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->pushBreadcrumbsNode('Dashboard');

        return $this->view('dashboard');
    }
}
