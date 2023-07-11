<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;

use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Resources\Tag\TagCollection;
use App\Http\Resources\Tag\TagResource;
use App\Services\Tag\CreateTagService;
use App\Services\Tag\GetAllTagsService;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    protected $createTagService;
    protected $getAllTagsService;

    public function __construct(
        CreateTagService $createTagService,
        GetAllTagsService $getAllTagsService
    ) {
        $this->createTagService = $createTagService;
        $this->getAllTagsService = $getAllTagsService;
    }

    public function index(Request $request)
    {
        return $this->sendResponse(
            new TagCollection($this->getAllTagsService->execute()),
            "",
            200
        );
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
