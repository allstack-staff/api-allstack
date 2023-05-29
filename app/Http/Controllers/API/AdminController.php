<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Resources\Admin\AdminResource;
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

    public function store(CreateAdminRequest $request)
    {
        return $this->sendResponse(
            new AdminResource($this->createAdminAccountService->execute($request->validated())),
            "",
            201
        );
    }
}
