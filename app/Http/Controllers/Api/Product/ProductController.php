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
  private $bread;

  public function __construct(ProductRepository $repository)
  {
    $this->repository = $repository;
  }

  public function index()
  {
    $products = $this->repository->getAll();
    foreach ($products as $product) {
      $product->photos;
      $fields = $product->fields;
      $pField = [];
      foreach ($fields as $field) {
        $pField[$field->product_field_setting_id] = $field->value;
      }
      unset($product->fields);
      $product->fields = $pField;
    }
    return response()->json([
      'status' => "OK",
      'products' => $products
    ]);
  }

  public function indexId($id)
  {
    $product = $this->repository->getById($id);
    $product->photos;
    $this->bread = [];
    $category = $product->category;
    $this->breads($category);
    $this->bread[] = ['title'=>$product->title,'id'=>$product->id];
    $pField = [];
    foreach ($product->fields as $field) {
      $pField[$field->product_field_setting_id] = $field->value;
    }
    unset($product->fields);
    $product->fields = $pField;
    return response()->json([
      'status' => "OK",
      'product' => $product,
      'bread' => $this->bread
    ]);
  }

  public function create()
  {
    try {
      $fotos = Input::file('fotos');
      $product = $this->repository->create(Input::all());
      if (count($fotos) > 0) {
        foreach ($fotos as $foto) {
          $extension = $foto->getClientOriginalExtension();
          $photoName = md5(uniqid(rand(), true)) . '.' . $extension;
          $dirName = "uploads/Product/";
          $image = Image::make($foto);
          $this->dispatch(new saveImage($image, $dirName, $photoName));
          $this->repository->addFoto(["product_id" => $product->id, "photo" => $photoName]);
        }
      }
      return response()->json([
        'status' => "OK"
      ]);
    } catch (Exception $e) {
      return response()->json([
        'status' => 'FAIL',
        'message' => $e->message()
      ]);
    }
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

  private function breads($category)
  {
    if (!$category->getParent) {
      $this->bread[] = ['title' => $category->title, 'id' => $category->id];
    } else {
      $this->breads($category->getParent);
      $this->bread[] = ['title' => $category->title, 'id' => $category->id];
    }
  }
}