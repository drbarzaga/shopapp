<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Requests\Backend\StoreUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->getAll();
        dd($users);
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
