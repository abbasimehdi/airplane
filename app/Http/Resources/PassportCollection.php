<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PassportCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'status' => false,
            'data' => [],
            'message' => __('text.Passport id is not exist'),
        ];
    }
}
