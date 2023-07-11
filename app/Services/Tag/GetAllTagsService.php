<?php

namespace App\Services\Tag;

use App\Repositories\TagRepository;

class GetAllTagsService
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute()
    {
        return $this->tagRepository->getAll();
    }
}
