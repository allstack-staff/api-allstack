<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

use App\Http\Requests\Reviewer\CreateReviewerRequest;
use App\Http\Requests\Reviewer\ChangeReviewerRequest;
use App\Http\Requests\Reviewer\DeleteReviewerRequest;
use App\Http\Requests\Reviewer\GetReviewerRequest;

use App\Services\Reviewer\CreateReviewerAccountService;
use App\Services\Reviewer\ChangeReviewerAccountService;
use App\Services\Reviewer\DeleteReviewerAccountService;
use App\Services\Reviewer\GetReviewerAccountService;
use App\Services\Reviewer\GetAllReviewerService;

use App\Http\Resources\Reviewer\ReviewerCollection;
use App\Http\Resources\Reviewer\ReviewerResource;


class ReviewerController extends BaseController
{
    protected $createReviewerAccountService;
    protected $changeReviewerAccountService;
    protected $deleteReviewerAccountService;
    protected $getReviewerAccountService;
    protected $getAllReviewerService;

    public function __construct(
        CreateReviewerAccountService $createReviewerAccountService,
        ChangeReviewerAccountService $changeReviewerAccountService,
        DeleteReviewerAccountService $deleteReviewerAccountService,
        GetReviewerAccountService $getReviewerAccountService,
        GetAllReviewerService $getAllReviewerService
    ) {
        $this->createReviewerAccountService = $createReviewerAccountService;
        $this->changeReviewerAccountService = $changeReviewerAccountService;
        $this->deleteReviewerAccountService = $deleteReviewerAccountService;
        $this->getReviewerAccountService = $getReviewerAccountService;
        $this->getAllReviewerService = $getAllReviewerService;
    }

    public function index(Request $request)
    {
        return $this->sendResponse(
            new ReviewerCollection($this->getAllReviewerService->execute()),
            "",
            201
        );
    }

    public function store(CreateReviewerRequest $request)
    {
        return $this->sendResponse(
            new ReviewerResource($this->createReviewerAccountService->execute($request->validated())),
            "",
            201
        );
    }

    public function change(ChangeReviewerRequest $request, $id)
    {
        return $this->sendResponse(
            new ReviewerResource($this->changeReviewerAccountService->execute($request->validated(), $id)),
            "",
            201
        );
    }

    public function delete(DeleteReviewerRequest $request)
    {
        return $this->sendResponse(
            new ReviewerResource($this->deleteReviewerAccountService->execute($request->validated())),
            "",
            201
        );
    }

    public function read(GetReviewerRequest $request)
    {
        return $this->sendResponse(
            new ReviewerResource($this->getReviewerAccountService->execute($request->validated())),
            "",
            201
        );
    }
}
