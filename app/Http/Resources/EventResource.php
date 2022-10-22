<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "dateBegin" => $this->dateBegin,
            "dateBeginLocal" => $this->dateBeginLocal,
            "dateEnd" => $this->dateEnd,
            "dateEndLocal" => $this->dateEndLocal,
            "timezone" => $this->timezone,
        ];
    }
}
