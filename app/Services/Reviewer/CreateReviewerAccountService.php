<?php

namespace App\Services\Reviewer;

use App\Services\CreateAccountService;
use App\Repositories\ReviewerRepository;

class CreateReviewerAccountService extends CreateAccountService
{
    public function __construct(ReviewerRepository $reviewerRepository)
    {
        parent::__construct($reviewerRepository);
    }
}
