<?php

namespace App\Services;

use App\Exceptions\DomainException;
use Illuminate\Support\Facades\Hash;

abstract class ChangeAccountService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data, $id)
    {
        $account = $this->repository->getById($id);

        if (!$account) {
            throw new DomainException(['Account not exist.'], 404);
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        // $this->updateAccount($id, $data);
        return $this->repository->update($id, $data);
    }
}

