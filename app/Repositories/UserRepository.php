<?php
/**
 * Created by PhpStorm.
 * User: dayan
 * Date: 05/03/2017
 * Time: 06:37 PM
 */

namespace App\Repositories;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements IRepository
{

    public function getAllItems()
    {
        return User::all();
    }

    public function getItemById($id)
    {
        return User::find($id);
    }

    public function addItem(Model $item)
    {
        // TODO: Implement addItem() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }
}