<?php

namespace App\Services\Reviewer;

use App\Services\ChangeAccountService;
use App\Repositories\ReviewerRepository;

class ChangeReviewerAccountService extends ChangeAccountService
{
    public function __construct(ReviewerRepository $reviewerRepository)
    {
        parent::__construct($reviewerRepository);
    }
}
