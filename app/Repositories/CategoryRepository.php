<?php
/**
 * Created by PhpStorm.
 * User: drbarzaga
 * Date: 07/03/2017
 * Time: 08:54 AM
 */

namespace App\Repositories;


use App\Models\Category;

class CategoryRepository implements IRepository
{
  private $model;

  public function __construct(Category $model)
  {
    $this->model = $model;
  }

  public function getAll()
  {
    return $this->model->all();
  }
  public function getRoot(){
    return $this->model->where('parent', null)->get();
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


}