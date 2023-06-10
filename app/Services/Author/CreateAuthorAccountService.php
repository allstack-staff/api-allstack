<?php

namespace App\Services\Author;

use App\Services\CreateAccountService;
use App\Repositories\AuthorRepository;

class CreateAuthorAccountService extends CreateAccountService
{
    public function __construct(AuthorRepository $authorRepository)
    {
        parent::__construct($authorRepository);
    }
}
