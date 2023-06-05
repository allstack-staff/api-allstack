<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Resources\Admin\AdminCollection;
use App\Http\Resources\Admin\AdminResource;
use App\Services\Admin\CreateAdminAccountService;
use App\Services\Admin\GetAllAdminsSercice;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    protected $createAdminAccountService;
    protected $getAllAdminsService;

    public function __construct(
        CreateAdminAccountService $createAdminAccountService,
        GetAllAdminsSercice $getAllAdminsSercice
    ) {
        $this->createAdminAccountService = $createAdminAccountService;
        $this->getAllAdminsService = $getAllAdminsSercice;
    }

    public function index(Request $request)
    {
        return $this->sendResponse(
            new AdminCollection($this->getAllAdminsService->execute()),
            "",
            200
        );
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
