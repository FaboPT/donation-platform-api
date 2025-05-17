<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
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
            'amount' => $this->__get('amount'),
            'campaign_id' => new CampaignResource($this->whenLoaded('campaign')),
            'user_id' => new UserResource($this->whenLoaded('user')),
            'description' => $this->__get('description'),
            'created_at' => $this->__get('created_at'),
            'updated_at' => $this->__get('updated_at'),
        ];
    }
}
