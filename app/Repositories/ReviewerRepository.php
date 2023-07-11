<?php

namespace App\Repositories;

use App\Models\Reviewer;

class ReviewerRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Reviewer $model)
    {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

}
