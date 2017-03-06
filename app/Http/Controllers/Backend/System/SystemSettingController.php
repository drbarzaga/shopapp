<?php

namespace App\Http\Controllers\Backend\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemSettingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/SYSTEM/SETTING/LIST');
    }

    public function create()
    {
        dd('ADMIN/SYSTEM/SETTING/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/SYSTEM/SETTING/STORE');
    }

    public function edit()
    {
        dd('ADMIN/SYSTEM/SETTING/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/SYSTEM/SETTING/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
