<?php
/**
 * Created by PhpStorm.
 * User: drbarzaga
 * Date: 06/03/2017
 * Time: 02:14 PM
 */

namespace App\Repositories;

use App\Models\User;
use App\Models\UserField;
use App\Models\UserFieldSetting;

class UserRepository implements IRepository
{
  private $model;
  private $fields;
  private $userFields;

  public function __construct(User $model, UserFieldSetting $fields,UserField $userF)
  {
    $this->model = $model;
    $this->fields = $fields;
    $this->userFields = $userF;
  }

  public function getAll()
  {
    return $this->model->all();
  }

  public function getById($id)
  {
    return $this->model->find($id);
  }

  public function create(array $attributes)
  {
    return $this->model->create($attributes);
  }

  public function update($id, array $attributes)
  {
    return $this->model->find($id)->update($attributes);
  }

  public function delete($id)
  {
    return $this->model->find($id)->delete();
  }

  public function getAllSetting()
  {
    return $this->fields->all();
  }

  public function createField(array $attributes)
  {
    return $this->fields->create($attributes);
  }

  public function createUserField(array $attributes)
  {
    return $this->userFields->create($attributes);
  }
}