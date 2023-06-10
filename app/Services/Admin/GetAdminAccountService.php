<?php

namespace App\Services\Admin;

use App\Services\GetAccountService;
use App\Repositories\AdminRepository;

class GetAdminAccountService extends GetAccountService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }
}
