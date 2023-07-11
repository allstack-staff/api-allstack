<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;

use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Resources\Tag\TagResource;
use App\Services\Tag\CreateTagService;

class TagController extends BaseController
{
    protected $createTagService;

    public function __construct(
        CreateTagService $createTagService
    ) {
        $this->createTagService = $createTagService;
    }

    public function store(CreateTagRequest $request)
    {
        return $this->sendResponse(
            new TagResource($this->createTagService->execute($request->validated())),
            "",
            201
        );
    }
}
