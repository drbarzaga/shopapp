<?php

namespace App\Http\Controllers\Backend\Local;

use App\Repositories\LocalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class LocalController extends Controller
{
  private $repository;

  public function __construct(LocalRepository $repository)
  {
    $this->repository = $repository;
  }

  public function index()
  {
    $locals = $this->repository->getAll();
    return View::make('backend.views.local.index')
      ->with('locals', $locals);
  }

  public function create()
  {
    return View::make('backend.views.local.create');
  }

  public function store(Request $request)
  {
    $rules = array(
      'title' => 'required',
      'description' => 'required',
      'urlmap' => 'required',
      'photo' => 'required'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return Redirect::to('admin/local/create')
        ->withErrors($validator)
        ->withInput();
    } else {
      if (Input::file('photo')->isValid()) {
        $destinationPath = '../storage/locals'; // upload path
        $extension = Input::file('photo')->getClientOriginalExtension(); // getting image extension
        $fileName = md5(uniqid(rand(), true)) . '.' . $extension; // renameing image
        //Input::file('photo')->move($destinationPath, $fileName); // uploading file to given path
        $folder='uploads/locals/';
        Image::make(Input::file('photo'))->resize(300, 200)->save($folder.'rafa.jpg');
        // sending back with message
        $local = $request->all();
        $local['photo'] = $fileName;
        $this->repository->create($local);
        Session::flash('message', 'Upload successfully');
        return Redirect::to('admin/local/list');
      } else {
        Session::flash('error', 'Create success');
        return Redirect::to('admin/local/create');
      }
    }
  }

  public function edit($id)
  {
    $local = $this->repository->getById($id);
    return View::make('backend.views.local.edit')
      ->with('local', $local);
  }

  public function update($id, Request $request)
  {
    $rules = array(
      'title' => 'required',
      'description' => 'required',
      'urlmap' => 'required',
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return Redirect::to('admin/local/create')
        ->withErrors($validator)
        ->withInput();
    } else {
      $locals = $this->repository->getById($id);
      if (Input::file('photo')) {
        if (Input::file('photo')->isValid()) {
          $destinationPath = '../storage/locals'; // upload path
          $fileName = $locals->photo;
          Input::file('photo')->move($destinationPath, $fileName); // uploading file to given path
          // sending back with message
          $local = $request->all();
          $local['photo'] = $fileName;
          $this->repository->update($id, $local);
          Session::flash('message', 'Upload successfully');
          return Redirect::to('admin/local/list');
        } else {
          Session::flash('error', 'Update success');
          return Redirect::to('admin/local/create');
        }
      }
      $local = $request->all();
      $local['photo'] = $locals->photo;
      $this->repository->update($id, $local);
      Session::flash('message', 'Upload successfully');
      return Redirect::to('admin/local/list');
    }
    dd('ADMIN/LOCAL/UPDATE');
  }

  public function destroy(Request $request)
  {
    $message = '';
    if ($request->ajax()) {
      return json_encode(['message' => $message]);
    }
  }
}
