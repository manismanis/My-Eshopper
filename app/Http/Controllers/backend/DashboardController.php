<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view($this->pagePath.'dashboard.dashboard');
    }
}
