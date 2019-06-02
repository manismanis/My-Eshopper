<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    protected $frontendPath = 'frontend.';
    protected $pagePath = '';

    public function __construct()
    {
        $this->pagePath = $this->frontendPath . 'pages';  //'.' chai yahi concatenate garna ko lagi..natra error aauchha..
    }
}
