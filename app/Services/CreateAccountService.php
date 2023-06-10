<?php

namespace App\Services;

use App\Exceptions\DomainException;
use Illuminate\Support\Facades\Hash;

abstract class CreateAccountService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $data)
    {
        $existingAccount = $this->repository->findByEmail($data['email']);

        if ($existingAccount) {
            throw new DomainException(['E-mail is already in use.'], 409);
        }

        $data['password'] = Hash::make($data['password']);

        $account = $this->repository->create($data);
        return $account;
    }
}
