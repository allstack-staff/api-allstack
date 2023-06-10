<?php

namespace App\Http\Resources\Reader;

use Illuminate\Http\Resources\Json\JsonResource;

class ReaderResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
