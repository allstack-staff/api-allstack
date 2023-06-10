<?php

namespace App\Services\Admin;

use App\Exceptions\DomainException;
use App\Repositories\AdminRepository;

class GetAllAdminService
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function execute()
    {
        $accounts = $this->adminRepository->getAll();

        // if (!$accounts) {
        //     throw new DomainException(['No registered account.'], 404);
        // }

        return $accounts;
    }
}
