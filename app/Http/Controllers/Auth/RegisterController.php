<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = '/';
  private $repository;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(UserRepository $repository)
  {
    $this->middleware('guest');
    $this->repository=$repository;
  }

  public function showRegistrationForm()
  {
    $field=$this->repository->getAllSetting();
    return view('auth.register')
      ->with(['fields'=>$field]);
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'username' => 'required|max:255|unique:users',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array $data
   * @return User
   */
  protected function create(array $data)
  {
    $user=User::create([
      'username' => $data['username'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
    unset($data["_token"]);
    unset($data["username"]);
    unset($data["email"]);
    unset($data["password"]);
    unset($data["password_confirmation"]);
    foreach ($data as $key=>$dt){
      $this->repository->createUserField(["user_id"=>$user->id,"user_field_setting_id"=>$key,"value"=>$dt]);
    }
    return $user;
  }
}
