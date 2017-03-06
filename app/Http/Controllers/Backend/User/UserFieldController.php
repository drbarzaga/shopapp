<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserFieldController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/USER/FIELD/LIST');
    }

    public function create()
    {
        dd('ADMIN/USER/FIELD/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/USER/FIELD/STORE');
    }

    public function edit()
    {
        dd('ADMIN/USER/FIELD/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/USER/FIELD/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
