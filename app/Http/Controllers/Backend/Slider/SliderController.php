<?php

namespace App\Http\Controllers\Backend\Slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/SLIDER/LIST');
    }

    public function create()
    {
        dd('ADMIN/SLIDER/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/SLIDER/STORE');
    }

    public function edit()
    {
        dd('ADMIN/SLIDER/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/SLIDER/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
