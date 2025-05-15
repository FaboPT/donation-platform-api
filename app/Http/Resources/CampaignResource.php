<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->__get('id'),
            'name' => $this->__get('name'),
            'description' => $this->__get('description'),
            'goal_amount' => $this->__get('goal_amount'),
            'start_date' => $this->__get('start_date'),
            'end_date' => $this->__get('end_date'),
            'user' => new UserResource($this->whenLoaded('user')),
            'created_at' => $this->__get('created_at'),
            'updated_at' => $this->__get('updated_at'),
        ];
    }
}
