<?php

namespace App\Services\Admin;

use App\Services\CreateAccountService;
use App\Repositories\AdminRepository;

class CreateAdminAccountService extends CreateAccountService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }
}
