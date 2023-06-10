<?php

namespace App\Services;

use App\Exceptions\DomainException;

abstract class DeleteAccountService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data)
    {
        $account = $this->deleteAccount($data['id']);

        if (!$account) {
            throw new DomainException(['Account not found.'], 404);
        }

        return $account;
    }

    protected function deleteAccount($id)
    {
        $account = $this->repository->getById($id);

        if (!$account) {
            return null;
        }

        $account->delete();
        return $account;
    }
}
