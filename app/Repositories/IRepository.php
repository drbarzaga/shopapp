<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: dayan
 * Date: 05/03/2017
 * Time: 06:31 PM
 */
interface IRepository
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}