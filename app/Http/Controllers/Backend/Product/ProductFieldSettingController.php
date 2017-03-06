<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductFieldSettingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/PRODUCT/FIELD/SETTING/LIST');
    }

    public function create()
    {
        dd('ADMIN/PRODUCT/FIELD/SETTING/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/PRODUCT/FIELD/SETTING/STORE');
    }

    public function edit()
    {
        dd('ADMIN/PRODUCT/FIELD/SETTING/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/PRODUCT/FIELD/SETTING/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
