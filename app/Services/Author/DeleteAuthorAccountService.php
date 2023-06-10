<?php

namespace App\Services\Author;

use App\Services\DeleteAccountService;
use App\Repositories\AuthorRepository;

class DeleteAuthorAccountService extends DeleteAccountService
{
    public function __construct(AuthorRepository $authorRepository)
    {
        parent::__construct($authorRepository);
    }
}
