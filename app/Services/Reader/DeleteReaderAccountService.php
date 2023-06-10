<?php

namespace App\Services\Reader;

use App\Services\DeleteAccountService;
use App\Repositories\ReaderRepository;

class DeleteReaderAccountService extends DeleteAccountService
{
    public function __construct(ReaderRepository $readerRepository)
    {
        parent::__construct($readerRepository);
    }
}
