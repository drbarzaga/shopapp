<?php
/**
 * Created by PhpStorm.
 * User: drbarzaga
 * Date: 07/03/2017
 * Time: 08:43 AM
 */

namespace App\Repositories;


use App\Models\Product;
use App\Models\ProductField;
use App\Models\ProductFieldSetting;

class ProductRepository implements IRepository
{
  private $model;
  private $field;
  private $fieldSetting;

  public function __construct(Product $model, ProductField $field, ProductFieldSetting $setting)
  {
    $this->model = $model;
    $this->field = $field;
    $this->fieldSetting = $setting;
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
    $product = $this->model->create($attributes);
    foreach ($attributes['field'] as $attribute) {
      $attribute=json_decode($attribute);
      $this->field->create(['product_id'=>$product->id,'product_field_setting_id'=>$attribute->id,'value'=>$attribute->value]);
    }
    return $product;
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
    return $this->fieldSetting->all();
  }

  public function createField(array $attributes)
  {
    return $this->fieldSetting->create($attributes);
  }
}