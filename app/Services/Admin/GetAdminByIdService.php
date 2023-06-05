<?php

namespace App\Services\Admin;

use App\Exceptions\DomainException;
use App\Repositories\AdminRepository;

class GetAdminByIdService
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function execute(int $id)
    {
        $existingAdmin = $this->adminRepository->getById($id);
        if (!$existingAdmin) {
            throw new DomainException(['Admin not found'], 404);
        }

        return $existingAdmin;
    }
}
