<?php
/**
 * Created by PhpStorm.
 * User: drbarzaga
 * Date: 07/03/2017
 * Time: 08:43 AM
 */

namespace App\Repositories;


use App\Models\Local;

class LocalRepository implements IRepository
{
    private $model;

    public function __construct(Local $model)
    {
        $this->model=$model;
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
}