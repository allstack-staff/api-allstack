<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

use App\Http\Requests\Reader\CreateReaderRequest;
use App\Http\Requests\Reader\ChangeReaderRequest;
use App\Http\Requests\Reader\DeleteReaderRequest;
use App\Http\Requests\Reader\GetReaderRequest;

use App\Services\Reader\CreateReaderAccountService;
use App\Services\Reader\ChangeReaderAccountService;
use App\Services\Reader\DeleteReaderAccountService;
use App\Services\Reader\GetReaderAccountService;
use App\Services\Reader\GetAllReaderService;

use App\Http\Resources\Reader\ReaderCollection;
use App\Http\Resources\Reader\ReaderResource;


class ReaderController extends BaseController
{
    protected $createReaderAccountService;
    protected $changeReaderAccountService;
    protected $deleteReaderAccountService;
    protected $getReaderAccountService;
    protected $getAllReaderService;

    public function __construct(
        CreateReaderAccountService $createReaderAccountService,
        ChangeReaderAccountService $changeReaderAccountService,
        DeleteReaderAccountService $deleteReaderAccountService,
        GetReaderAccountService $getReaderAccountService,
        GetAllReaderService $getAllReaderService
    ) {
        $this->createReaderAccountService = $createReaderAccountService;
        $this->changeReaderAccountService = $changeReaderAccountService;
        $this->deleteReaderAccountService = $deleteReaderAccountService;
        $this->getReaderAccountService = $getReaderAccountService;
        $this->getAllReaderService = $getAllReaderService;
    }

    public function index(Request $request)
    {
        return $this->sendResponse(
            new ReaderCollection($this->getAllReaderService->execute()),
            "",
            200
        );
    }

    public function store(CreateReaderRequest $request)
    {
        return $this->sendResponse(
            new ReaderResource($this->createReaderAccountService->execute($request->validated())),
            "",
            201
        );
    }

    public function change(ChangeReaderRequest $request, $id)
    {
        return $this->sendResponse(
            new ReaderResource($this->changeReaderAccountService->execute($request->validated(), $id)),
            "",
            200
        );
    }

    public function delete(DeleteReaderRequest $request)
    {
        return $this->sendResponse(
            new ReaderResource($this->deleteReaderAccountService->execute($request->validated())),
            "",
            200
        );
    }

    public function read(GetReaderRequest $request)
    {
        return $this->sendResponse(
            new ReaderResource($this->getReaderAccountService->execute($request->validated())),
            "",
            200
        );
    }
}
