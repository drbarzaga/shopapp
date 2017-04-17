<?php

namespace App\Http\Controllers\Api\Car;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\UserRepository;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use MongoDB\Driver\Exception\Exception;


class CarController extends Controller
{

  public function userCar()
  {

    if (Auth::guest()) {
      $car = request()->session()->get('car', []);
     } else {
      dump(Auth::user()->car);
      die;
    }
    return response()->json([
      'status' => "OK",
      'car' => $car
    ]);
  }

  public function product()
  {
    $product = Input::get('product');
    $cant = Input::get('cant');
    $product = Product::find($product);
    $car = request()->session()->get('car', []);
    $index=$key = array_search($product, array_column($car, 'product'));
    if($index===false){
      $car[]=['product'=>$product,'cant'=>$cant];
    }else{
      $car[$index]["cant"]+=$cant;
    }
    request()->session()->put('car', $car);
    return response()->json([
      'status' => "OK",
      'car' => $car,
      'index'=>$index
    ]);
  }
}