<?php

namespace App\Services\Reader;

use App\Services\CreateAccountService;
use App\Repositories\ReaderRepository;

class CreateReaderAccountService extends CreateAccountService
{
    public function __construct(ReaderRepository $readerRepository)
    {
        parent::__construct($readerRepository);
    }
}
