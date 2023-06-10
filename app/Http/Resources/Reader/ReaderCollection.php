<?php

namespace App\Http\Resources\Reader;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReaderCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection;
    }
}
