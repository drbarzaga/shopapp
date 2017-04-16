<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
  function __construct()
  {
  }

  public function index()
  {
    return view('fronted.views.home.index');
  }

  public function category($id)
  {
    return view('fronted.views.category.index')
      ->with('category', $id);
  }
  public function product($id)
  {
    return view('fronted.views.product.index')
      ->with('product', $id);
  }
  public function quienesSomos()
  {
    $content=file_get_contents(storage_path('static_pages/quienes_somos.static'));
    return View::make('fronted.views.quienesSomos.index')
      ->with('content', $content);
  }
  public function contactenos()
  {
    $content=file_get_contents(storage_path('static_pages/contactenos.static'));
    return View::make('fronted.views.contactenos.index')
      ->with('content', $content);
  }
  public function termCond()
  {
    $content=file_get_contents(storage_path('static_pages/terminos_y_condiciones.static'));
    return View::make('fronted.views.termCond.index')
      ->with('content', $content);
  }
}
