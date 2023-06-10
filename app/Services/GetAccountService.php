<?php

namespace App\Services;

use App\Exceptions\DomainException;

abstract class GetAccountService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data)
    {
        $account = $this->findAccount($data);

        if (!$account) {
            throw new DomainException(['Account not found.'], 404);
        }

        return $account;
    }

    protected function findAccount(array $data)
    {
        if (isset($data['id'])) {
            return $this->repository->getById($data['id']);
        }

        if (isset($data['email'])) {
            return $this->repository->findByEmail($data['email']);
        }

        return null;
    }
}
