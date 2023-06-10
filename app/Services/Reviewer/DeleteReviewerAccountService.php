<?php

namespace App\Services\Reviewer;

use App\Services\DeleteAccountService;
use App\Repositories\ReviewerRepository;

class DeleteReviewerAccountService extends DeleteAccountService
{
    public function __construct(ReviewerRepository $reviewerRepository)
    {
        parent::__construct($reviewerRepository);
    }
}
