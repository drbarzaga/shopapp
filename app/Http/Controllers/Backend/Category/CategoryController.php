<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/CATEGORY/LIST');
    }

    public function create()
    {
        dd('ADMIN/CATEGORY/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/CATEGORY/STORE');
    }

    public function edit()
    {
        dd('ADMIN/CATEGORY/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/CATEGORY/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
