<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Requests\Backend\StoreUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

  public function index()
  {
    return view('backend.views.user.index');
  }

  public function indexField()
  {
    return view('backend.views.user.index_field');
  }
}
