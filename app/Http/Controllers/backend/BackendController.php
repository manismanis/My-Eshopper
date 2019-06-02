<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    protected $backendPath = 'backend.';
    protected $pagePath = '';

    public function __construct()
    {
        $this->pagePath = $this->backendPath . 'pages.';
    }
}
