<?php

namespace App\Services\Reader;

use App\Exceptions\DomainException;
use App\Repositories\ReaderRepository;

class GetAllReaderService
{
    private $readerRepository;

    public function __construct(ReaderRepository $readerRepository)
    {
        $this->readerRepository = $readerRepository;
    }

    public function execute()
    {
        $accounts = $this->readerRepository->getAll();

        // if (!$accounts) {
        //     throw new DomainException(['No registered account.'], 404);
        // }

        return $accounts;
    }
}
