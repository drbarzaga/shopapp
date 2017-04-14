<?php

namespace App\Http\Controllers\Backend\Product;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
  public function index()
  {
    return view('backend.views.product.index');
  }
  public function indexField()
  {
    return view('backend.views.product.index_field');
  }
}
