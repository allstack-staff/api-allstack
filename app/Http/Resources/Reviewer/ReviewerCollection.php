<?php

namespace App\Http\Resources\Reviewer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewerCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection;
    }
}
