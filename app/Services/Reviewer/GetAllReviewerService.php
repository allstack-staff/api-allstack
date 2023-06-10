<?php

namespace App\Services\Reviewer;

use App\Exceptions\DomainException;
use App\Repositories\ReviewerRepository;

class GetAllReviewerService
{
    private $reviewerRepository;

    public function __construct(ReviewerRepository $reviewerRepository)
    {
        $this->reviewerRepository = $reviewerRepository;
    }

    public function execute()
    {
        $accounts = $this->reviewerRepository->getAll();

        // if (!$accounts) {
        //     throw new DomainException(['No registered account.'], 404);
        // }

        return $accounts;
    }
}
