<?php

namespace App\Services\Tag;

use App\Exceptions\DomainException;
use App\Services\CreateAccountService;
use App\Repositories\TagRepository;

class CreateTagService extends CreateAccountService
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute(array $data)
    {
        $existingTag = $this->tagRepository->findByName($data["name"]);
        if ($existingTag) {
            throw new DomainException(["Name is already in use."], 409);
        }

        return $this->tagRepository->create($data);
    }
}
