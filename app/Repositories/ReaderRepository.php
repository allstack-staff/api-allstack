<?php

namespace App\Repositories;

use App\Models\Reader;

class ReaderRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Reader $model)
    {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
