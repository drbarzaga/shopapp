<?php

namespace App\Http\Controllers\Backend\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderFieldSettingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/ORDER/FIELD/SETTING/LIST');
    }

    public function create()
    {
        dd('ADMIN/ORDER/FIELD/SETTING/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/ORDER/FIELD/SETTING/STORE');
    }

    public function edit()
    {
        dd('ADMIN/ORDER/FIELD/SETTING/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/ORDER/FIELD/SETTING/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
