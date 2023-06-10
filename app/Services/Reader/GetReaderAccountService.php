<?php

namespace App\Services\Reader;

use App\Services\GetAccountService;
use App\Repositories\ReaderRepository;

class GetReaderAccountService extends GetAccountService
{
    public function __construct(ReaderRepository $readerRepository)
    {
        parent::__construct($readerRepository);
    }
}
