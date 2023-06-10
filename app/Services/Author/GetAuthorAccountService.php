<?php

namespace App\Services\Author;

use App\Services\GetAccountService;
use App\Repositories\AuthorRepository;

class GetAuthorAccountService extends GetAccountService
{
    public function __construct(AuthorRepository $authorRepository)
    {
        parent::__construct($authorRepository);
    }
}
