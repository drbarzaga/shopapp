<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductFieldController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/PRODUCT/FIELD/LIST');
    }

    public function create()
    {
        dd('ADMIN/PRODUCT/FIELD/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/PRODUCT/FIELD/STORE');
    }

    public function edit()
    {
        dd('ADMIN/PRODUCT/FIELD/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/PRODUCT/FIELD/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
