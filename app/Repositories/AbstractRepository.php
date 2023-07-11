<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(array $filterParams = [])
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->getById($id);
        $record->update($data);

        return $record->refresh();
    }

    public function delete($id)
    {
        $record = $this->getById($id);

        return $record->delete();
    }

    protected function setPaginationParameters(array &$filterParams, &$perPage, &$page)
    {
        if (isset($filterParams['perPage']) && !empty($filterParams['perPage'])) {
            $perPage = intval($filterParams['perPage']);
        }

        if (isset($filterParams['page']) && !empty($filterParams['page'])) {
            $page = intval($filterParams['page']);
        }
    }
}