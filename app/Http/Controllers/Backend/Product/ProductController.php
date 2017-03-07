<?php

namespace App\Http\Controllers\Backend\Product;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        dd('ADMIN/PRODUCT/LIST');
    }

    public function create()
    {
        dd('ADMIN/PRODUCT/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/PRODUCT/STORE');
    }

    public function edit()
    {
        dd('ADMIN/PRODUCT/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/PRODUCT/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
