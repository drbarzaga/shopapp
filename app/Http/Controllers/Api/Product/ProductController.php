<?php

namespace App\Http\Controllers\Api\Product;

use App\Console\Commands\saveImage;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use MongoDB\Driver\Exception\Exception;


class ProductController extends Controller
{
  private $repository;
  public function __construct(ProductRepository $repository)
  {
    $this->repository = $repository;
  }

  public function index(){
    return response()->json([
      'status'=>"OK"
    ]);
  }

  public function indexId(){

  }

  public function create(){
    try{
      $product=$this->repository->create(Input::all());
      return response()->json([
        'status'=>"OK",
        'product'=>$product
      ]);
    }catch (Exception $e){
      return response()->json([
        'status' => 'FAIL',
        'message' => $e->message()
      ]);
    }
  }

  public function edit(){

  }

  public function destroy(){

  }

  public function indexField(){
    $field=$this->repository->getAllSetting();
    return response()->json([
      'status'=>"OK",
      'field'=>$field
    ]);
  }
  public function createField(){
    try{
      $field=$this->repository->createField(Input::all());
      return response()->json([
        'status' => 'OK',
        'field' => $field
      ]);
    }catch (Exception $e){
      return response()->json([
        'status' => 'FAIL',
        'message' => $e->message()
      ]);
    }
  }
}
