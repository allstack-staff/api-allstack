<?php

namespace App\Services\Reviewer;

use App\Services\GetAccountService;
use App\Repositories\ReviewerRepository;

class GetReviewerAccountService extends GetAccountService
{
    public function __construct(ReviewerRepository $reviewerRepository)
    {
        parent::__construct($reviewerRepository);
    }
}
