<?php

namespace App\Services\Tag;

use App\Exceptions\DomainException;
use App\Repositories\TagRepository;

class GetTagByIdService
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute(int $id)
    {
        $existingTag = $this->tagRepository->getById($id);
        if (!$existingTag) {
            throw new DomainException(["Tag not found."], 404);
        }

        return $existingTag;
    }
}
