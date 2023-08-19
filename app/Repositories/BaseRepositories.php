<?php

namespace App\Repositories;

abstract class BaseRepositories implements RepositoriesInterface
{
    protected $model;

    public function __construct()
    {
        $this->model  = app()->make(
            $this->getModle()
        );
    }

    abstract public function getModle();
    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id)
    {
        $object = $this->model->find($id);

        return $object->update($data);
    }

    public function delete(int $id)
    {
        $object = $this->model->find($id);

        return $object->delete();
    }
}
