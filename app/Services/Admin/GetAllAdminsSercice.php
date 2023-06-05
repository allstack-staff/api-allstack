<?php

namespace App\Services\Admin;

use App\Repositories\AdminRepository;

class GetAllAdminsSercice
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function execute()
    {
        return $this->adminRepository->getAll();
    }
}
