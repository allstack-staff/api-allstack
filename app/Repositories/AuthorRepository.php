<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Author $model)
    {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}
