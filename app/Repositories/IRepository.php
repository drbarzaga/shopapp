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
    public function all($columns = array('*'));

    public function paginate($perPage = 15, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));
}