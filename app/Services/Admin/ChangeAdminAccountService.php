<?php

namespace App\Services\Admin;

use App\Services\ChangeAccountService;
use App\Repositories\AdminRepository;

class ChangeAdminAccountService extends ChangeAccountService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }
}
