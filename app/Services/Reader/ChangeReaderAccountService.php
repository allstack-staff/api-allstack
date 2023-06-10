<?php

namespace App\Services\Reader;

use App\Services\ChangeAccountService;
use App\Repositories\ReaderRepository;

class ChangeReaderAccountService extends ChangeAccountService
{
    public function __construct(ReaderRepository $readerRepository)
    {
        parent::__construct($readerRepository);
    }
}
