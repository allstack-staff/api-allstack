<?php

namespace App\Services\Author;

use App\Exceptions\DomainException;
use App\Repositories\AuthorRepository;

class GetAllAuthorService
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function execute()
    {
        $accounts = $this->authorRepository->getAll();

        // if (!$accounts) {
        //     throw new DomainException(['No registered account.'], 404);
        // }

        return $accounts;
    }
}
