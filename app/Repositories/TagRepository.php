<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
}
