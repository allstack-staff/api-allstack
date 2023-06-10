<?php

namespace App\Services\Author;

use App\Services\ChangeAccountService;
use App\Repositories\AuthorRepository;

class ChangeAuthorAccountService extends ChangeAccountService
{
    public function __construct(AuthorRepository $authorRepository)
    {
        parent::__construct($authorRepository);
    }
}
