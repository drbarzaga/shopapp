<?php

namespace App\Http\Controllers\Api\Category;

use App\Console\Commands\saveImage;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
  private $repository;
  private $bread;
  public function __construct(CategoryRepository $repository)
  {
    $this->repository = $repository;
  }

  public function index()
  {
    $categories=$this->repository->getAll();
    return response()->json([
      'status' => 'OK',
      'category' => $categories
    ]);
  }
  public function indexRoot()
  {
    $categories=$this->repository->getRoot();
    foreach ($categories as $category) {
      $childs=$category->getChildrens;
    }
    return response()->json([
      'status' => 'OK',
      'category' => $categories,
      'bread' => []
    ]);
  }
  public function indexId($id)
  {
    $category=$this->repository->getById($id);
    foreach($category->getChildrens as $children){
      $children->getChildrens;
    };
    foreach ($category->Products as $product) {
      $product->photos;
      $pField=[];
      foreach ($product->fields as $field) {
        $pField[$field->product_field_setting_id]=$field->value;
      }
      unset($product->fields);
      $product->fields=$pField;
    }
    $this->bread=[];
    $this->breads($category);
    return response()->json([
      'status' => 'OK',
      'category' => $category,
      'bread' => $this->bread
    ]);
  }
  public function create()
  {
    $title=Input::get('title');
    $parent=Input::get('parent');
    $category=["title"=>$title];
    if($parent!=-1){
      $category['parent']=$parent;
    }
    //upload IMAGE
    $extension = Input::file('foto')->getClientOriginalExtension();
    $photoName=md5(uniqid(rand(), true)) . '.' . $extension;
    $dirName="uploads/Category/";
    $image=Image::make(Input::file('foto'));
    $this->dispatch(new saveImage($image,$dirName,$photoName));
    $category['photo']=$photoName;
    try{
      $category=$this->repository->create($category);
      return response()->json([
        'status' => 'OK',
      ]);
    }catch (Exception $e){
      return response()->json([
        'status' => 'FAIL',
        'message' => $e->message()
      ]);
    }

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

  private function breads($category){
    if(!$category->getParent){
      $this->bread[]=['title'=>$category->title,'id'=>$category->id];
    }else{
      $this->breads($category->getParent);
      $this->bread[]=['title'=>$category->title,'id'=>$category->id];
    }
  }
}
