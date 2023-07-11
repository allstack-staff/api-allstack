<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
