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
        // TODO: Implement getAll() method.
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}