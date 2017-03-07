<?php

namespace App\Http\Controllers\Backend\Local;

use App\Repositories\LocalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalController extends Controller
{
    private $repository;

    public function __construct(LocalRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        dd('ADMIN/LOCAL/LIST');
    }

    public function create()
    {
        dd('ADMIN/LOCAL/CREATE');
    }

    public function store(Request $request)
    {
        dd('ADMIN/LOCAL/STORE');
    }

    public function edit()
    {
        dd('ADMIN/LOCAL/EDIT');
    }

    public function update(Request $request)
    {
        dd('ADMIN/LOCAL/UPDATE');
    }

    public function destroy(Request $request)
    {
        $message='';
        if($request->ajax()){
            return json_encode(['message'=>$message]);
        }
    }
}
