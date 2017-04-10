<?php

namespace App\Http\Controllers\Api\Category;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  private $repository;

  public function __construct(CategoryRepository $repository)
  {
    $this->repository = $repository;
  }

  public function index()
  {
    $categories=$this->repository->getAll();
//    dump($categories);
//    die;
    return response()->json([
      'status' => 'OK',
      'category' => $categories
    ]);
  }
  public function indexId($id)
  {
    $category=$this->repository->getById($id);
    return response()->json([
      'status' => 'OK',
      'category' => $category
    ]);
  }
  public function create()
  {
    return response()->json([
      'status' => 'post',
      'method' => 'get',
      'route' => 'create'
    ]);
  }

  public function edit($id)
  {
    return response()->json([
      'status' => 'OK',
      'method' => 'post',
      'route' => 'edit-'.$id
    ]);
  }

  public function destroy($id)
  {
    return response()->json([
      'status' => 'OK',
      'method' => 'delete',
      'route' => 'delete-'.$id
    ]);
  }
}
