<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;

use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Resources\Tag\TagCollection;
use App\Http\Resources\Tag\TagResource;
use App\Services\Tag\CreateTagService;
use App\Services\Tag\GetAllTagsService;
use App\Services\Tag\GetTagByIdService;
use Illuminate\Http\Request;

class TagController extends BaseController
{
    protected $createTagService;
    protected $getAllTagsService;
    protected $getTagByIdService;

    public function __construct(
        CreateTagService $createTagService,
        GetAllTagsService $getAllTagsService,
        GetTagByIdService $getTagByIdService
    ) {
        $this->createTagService = $createTagService;
        $this->getAllTagsService = $getAllTagsService;
        $this->getTagByIdService = $getTagByIdService;
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

    public function getById(Request $request, int $id)
    {
        return $this->sendResponse(
            new TagResource($this->getTagByIdService->execute($id)),
            "",
            200
        );
    }
}
