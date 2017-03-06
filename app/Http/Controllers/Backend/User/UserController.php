<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Requests\Backend\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/USER/LIST');
    }

    public function create()
    {
        dd('ADMIN/USER/CREATE');
    }

    public function store(StoreUserRequest $request)
    {
        dd('ADMIN/USER/STORE');
    }

    public function edit()
    {
        dd('ADMIN/USER/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/USER/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
