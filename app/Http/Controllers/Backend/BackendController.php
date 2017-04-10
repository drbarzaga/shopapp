<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('backend.views.admin.dashboard');
    }
}
