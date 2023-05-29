<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Services\Admin\CreateAdminAccountService;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    protected $createAdminAccountService;

    public function __construct(
        CreateAdminAccountService $createAdminAccountService
    ) {
        $this->createAdminAccountService = $createAdminAccountService;
    }

    public function store(Request $request)
    {
        $adminArray = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->passwords
        ];

        return $this->sendResponse(
            $this->createAdminAccountService->execute($adminArray),
            "",
            201
        );
    }
}
