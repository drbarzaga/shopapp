<?php

namespace App\Http\Controllers\Backend\Slider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderPhotoController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        dd('ADMIN/SLIDER/PHOTO/LIST');
    }

    public function create()
    {
        dd('ADMIN/SLIDER/PHOTO/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/SLIDER/PHOTO/STORE');
    }

    public function edit()
    {
        dd('ADMIN/SLIDER/PHOTO/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/SLIDER/PHOTO/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
