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
    public function getAllItems();
    public function getItemById($id);
    public function addItem(Model $item);
    public function deleteById($id);
}