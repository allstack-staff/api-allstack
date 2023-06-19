<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\ChangeAdminRequest;
use App\Http\Requests\Admin\DeleteAdminRequest;
use App\Http\Requests\Admin\GetAdminRequest;

use App\Services\Admin\CreateAdminAccountService;
use App\Services\Admin\ChangeAdminAccountService;
use App\Services\Admin\DeleteAdminAccountService;
use App\Services\Admin\GetAdminAccountService;
use App\Services\Admin\GetAllAdminService;

use App\Http\Resources\Admin\AdminCollection;
use App\Http\Resources\Admin\AdminResource;


class AdminController extends BaseController
{
    protected $createAdminAccountService;
    protected $changeAdminAccountService;
    protected $deleteAdminAccountService;
    protected $getAdminAccountService;
    protected $getAllAdminService;

    public function __construct(
        CreateAdminAccountService $createAdminAccountService,
        ChangeAdminAccountService $changeAdminAccountService,
        DeleteAdminAccountService $deleteAdminAccountService,
        GetAdminAccountService $getAdminAccountService,
        GetAllAdminService $getAllAdminService
    ) {
        $this->createAdminAccountService = $createAdminAccountService;
        $this->changeAdminAccountService = $changeAdminAccountService;
        $this->deleteAdminAccountService = $deleteAdminAccountService;
        $this->getAdminAccountService = $getAdminAccountService;
        $this->getAllAdminService = $getAllAdminService;
    }

    public function index(Request $request)
    {
        return $this->sendResponse(
            new AdminCollection($this->getAllAdminService->execute()),
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

    public function change(ChangeAdminRequest $request, $id)
    {
        return $this->sendResponse(
            new AdminResource($this->changeAdminAccountService->execute($request->validated(), $id)),
            "",
            200
        );
    }

    public function delete(DeleteAdminRequest $request)
    {
        return $this->sendResponse(
            new AdminResource($this->deleteAdminAccountService->execute($request->validated())),
            "",
            200
        );
    }

    public function read(GetAdminRequest $request)
    {
        return $this->sendResponse(
            new AdminResource($this->getAdminAccountService->execute($request->validated())),
            "",
            200
        );
    }
}
