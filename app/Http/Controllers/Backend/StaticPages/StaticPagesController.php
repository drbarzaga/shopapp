<?php

namespace App\Http\Controllers\Backend\StaticPages;

use App\Http\Controllers\Controller;
use Faker\Provider\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
class StaticPagesController extends Controller
{

  public function indexQuienesSomos()
  {
    $content = file_get_contents(storage_path('static_pages/quienes_somos.static'));
    return View::make('backend.views.quienesSomos.index')
      ->with('content', $content);
  }

  public function QuienesSomosSave()
  {
    file_put_contents(storage_path('static_pages/quienes_somos.static'), Input::get('content'));
    return response()->json([
      'status' => 'OK'
    ]);
  }

  public function indexContactenos()
  {
    $content=file_get_contents(storage_path('static_pages/contactenos.static'));
    return View::make('backend.views.contactenos.index')
      ->with('content', $content);
  }

  public function contactenosSave()
  {
    file_put_contents(storage_path('static_pages/contactenos.static'),Input::get('content'));
    return response()->json([
      'status'=>'OK'
    ]);
  }

  public function indextermCond()
  {
    $content=file_get_contents(storage_path('static_pages/terminos_y_condiciones.static'));
    return View::make('backend.views.termCond.index')
      ->with('content', $content);
  }

  public function termCondSave()
  {
    file_put_contents(storage_path('static_pages/terminos_y_condiciones.static'),Input::get('content'));
    return response()->json([
      'status'=>'OK'
    ]);
  }

  public function imgUpload()
  {
    $server = Input::get('server');
    $destinationPath = 'uploads/froalaEditor'; // upload path
    $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
    $fileName = md5(uniqid(rand(), true)) . '.' . $extension; // renameing image
    Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
    return response()->json([
      'link' => $server . '/../' . $destinationPath . '/' . $fileName,
    ]);
  }

  public function imgDelete()
  {
    $image = Input::get('src');
    $image = explode('/', $image);
    $image = $image[count($image) - 1];
    @unlink(public_path('uploads/froalaEditor/' . $image));
    return response()->json([
      'status' => 'OK'
    ]);
  }

}