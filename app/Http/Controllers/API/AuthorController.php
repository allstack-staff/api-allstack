<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\ChangeAuthorRequest;
use App\Http\Requests\Author\DeleteAuthorRequest;
use App\Http\Requests\Author\GetAuthorRequest;

use App\Services\Author\CreateAuthorAccountService;
use App\Services\Author\ChangeAuthorAccountService;
use App\Services\Author\DeleteAuthorAccountService;
use App\Services\Author\GetAuthorAccountService;
use App\Services\Author\GetAllAuthorService;

use App\Http\Resources\Author\AuthorCollection;
use App\Http\Resources\Author\AuthorResource;


class AuthorController extends BaseController
{
    protected $createAuthorAccountService;
    protected $changeAuthorAccountService;
    protected $deleteAuthorAccountService;
    protected $getAuthorAccountService;
    protected $getAllAuthorService;

    public function __construct(
        CreateAuthorAccountService $createAuthorAccountService,
        ChangeAuthorAccountService $changeAuthorAccountService,
        DeleteAuthorAccountService $deleteAuthorAccountService,
        GetAuthorAccountService $getAuthorAccountService,
        GetAllAuthorService $getAllAuthorService
    ) {
        $this->createAuthorAccountService = $createAuthorAccountService;
        $this->changeAuthorAccountService = $changeAuthorAccountService;
        $this->deleteAuthorAccountService = $deleteAuthorAccountService;
        $this->getAuthorAccountService = $getAuthorAccountService;
        $this->getAllAuthorService = $getAllAuthorService;
    }

    public function index(Request $request)
    {
        return $this->sendResponse(
            new AuthorCollection($this->getAllAuthorService->execute()),
            "",
            201
        );
    }

    public function store(CreateAuthorRequest $request)
    {
        return $this->sendResponse(
            new AuthorResource($this->createAuthorAccountService->execute($request->validated())),
            "",
            201
        );
    }

    public function change(ChangeAuthorRequest $request, $id)
    {
        return $this->sendResponse(
            new AuthorResource($this->changeAuthorAccountService->execute($request->validated(), $id)),
            "",
            201
        );
    }

    public function delete(DeleteAuthorRequest $request)
    {
        return $this->sendResponse(
            new AuthorResource($this->deleteAuthorAccountService->execute($request->validated())),
            "",
            201
        );
    }

    public function read(GetAuthorRequest $request)
    {
        return $this->sendResponse(
            new AuthorResource($this->getAuthorAccountService->execute($request->validated())),
            "",
            201
        );
    }
}
