<?php


namespace App\Services;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class BaseService
{
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function query($relation = null)
    {
        if ($relation) return $this->model->with($relation);
        return $this->model->query();
    }

    public function selectField($field)
    {
        return $this->model->select($field);
    }

    public function selectFieldWithRelation($field, $relation)
    {
        return $this->model->with($relation)->select($field);
    }

    public function getById($id)
    {
        if ($id) {
            $object = $this->model->find($id);
            if ($object) {
                return (object)$object;
            }
            return 404;
        }
        return 400;
    }

    public function create($attributes)
    {
        if (!$attributes) {
            return '400';
        }
        if (Schema::hasColumn($this->model->getTable(), 'create_uid')) {
            $attributes["create_uid"] = auth()->user()->getAuthIdentifier();
        }
        return $this->model->create($attributes->all());
    }

    public function updateOrCreate($attributes)
    {
//        if (!$attributes) {
//            return false;
//        }
//        return $this->model->updateOrCreate($attributes);
    }

    public function updateById($id, $attribute)
    {
        $modelObj = $this->getById($id);
        if (!$modelObj) {
            return '400';
        }
        if (Schema::hasColumn($this->model->getTable(), 'write_uid')) {
            $attribute["write_uid"] = auth()->user()->getAuthIdentifier();
        }
        $result = $modelObj->fill($attribute->all());
        $result->update();
        return $result;
    }

    public function getByArray($field, $attribute)
    {
        $result = $this->model->whereIn($field, $attribute)->get();
        if (!$result) {
            return false;
        }
        return $result;
    }

    public function getList()
    {
//        return $this->model->all()->toArray();
    }

    public function delete($id, $error = true): bool|string
    {
        $result = $this->model->find($id);
        if ($result instanceof $this->model) {
            $result->delete();
            return $result;
        }
        return $error ? '404' : false;
    }

    public function getData()
    {

    }

    public function assignRole()
    {

    }

    public function givePermission()
    {

    }
}
