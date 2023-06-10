<?php

namespace App\Services\Admin;

use App\Services\DeleteAccountService;
use App\Repositories\AdminRepository;

class DeleteAdminAccountService extends DeleteAccountService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }
}
