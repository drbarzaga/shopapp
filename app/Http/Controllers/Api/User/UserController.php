<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Input;
use MongoDB\Driver\Exception\Exception;


class UserController extends Controller
{
  private $repository;

  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function index()
  {
    $user = $this->repository->getAll();
    return response()->json([
      'status' => "OK",
      'users' => $user
    ]);
  }

  public function indexId($id)
  {

  }

  public function create()
  {

  }

  public function edit()
  {

  }

  public function destroy()
  {

  }

  public function indexField()
  {
    $field = $this->repository->getAllSetting();
    return response()->json([
      'status' => "OK",
      'field' => $field
    ]);
  }

  public function createField()
  {
    try {
      $field = $this->repository->createField(Input::all());
      return response()->json([
        'status' => 'OK',
        'field' => $field
      ]);
    } catch (Exception $e) {
      return response()->json([
        'status' => 'FAIL',
        'message' => $e->message()
      ]);
    }
  }

}