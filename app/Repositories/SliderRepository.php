<?php
/**
 * Created by PhpStorm.
 * User: drbarzaga
 * Date: 07/03/2017
 * Time: 11:24 AM
 */

namespace App\Repositories;


use App\Models\Slider;

class SliderRepository implements IRepository
{

    private $model;

    public function __construct(Slider $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {

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