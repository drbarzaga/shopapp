<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserFieldSettingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/USER/FIELD/SETTING/LIST');
    }

    public function create()
    {
        dd('ADMIN/USER/FIELD/SETTING/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/USER/FIELD/SETTING/STORE');
    }

    public function edit()
    {
        dd('ADMIN/USER/FIELD/SETTING/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/USER/FIELD/SETTING/UPDATE');
    }

    public function destroy(Request $request)
    {
        dd('ADMIN/USER/FIELD/SETTING/DESTROY');
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
