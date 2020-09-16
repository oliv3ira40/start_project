<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
