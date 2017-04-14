<?php

namespace App\Http\Controllers\Backend\Local;

use App\Repositories\LocalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class LocalController extends Controller
{
  public function index()
  {
    return View::make('backend.views.local.index');
  }
}
