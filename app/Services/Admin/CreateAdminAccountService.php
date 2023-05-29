<?php

namespace App\Services\Admin;

use App\Exceptions\DomainException;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Hash;

class CreateAdminAccountService
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function execute(array $data)
    {
        $existingAdmin = $this->adminRepository->findByEmail($data['email']);
        if ($existingAdmin) {
            throw new DomainException(['E-mail is alrady in use.'], 409);
        }

        $data['password'] = Hash::make($data['password']);

        $teacher = $this->adminRepository->create($data);

        return $teacher;
    }
}
