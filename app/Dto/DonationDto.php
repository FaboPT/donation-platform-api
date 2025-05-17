<?php

namespace App\Dto;

use App\Http\Requests\Campaign\UpdateCampaignRequest;

class DonationDto
{
    public function __construct(
        private ?int    $campaign_id,
        private readonly int     $user_id,
        private readonly float   $amount,
        private readonly ?string $description,
    ) {
    }

    /**
     * @param array{
     *     campaign_id: ?int,
     *     user_id: int,
     *     amount: float,
     *     description: ?string
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['campaign_id'] ?? null,
            $data['user_id'],
            $data['amount'],
            $data['description'] ?? null,
        );
    }

    public static function fromRequest(UpdateCampaignRequest $request): self
    {
        return new self(
            $request->input('campaign_id'),
            $request->input('user_id'),
            $request->input('amount'),
            $request->input('description'),
        );
    }
    public function getCampaignId(): ?int
    {
        return $this->campaign_id;
    }
    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function getAmount(): float
    {
        return $this->amount;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Convert the DTO to an array.
     *
     * @return array{
     *      campaign_id: int,
     *      user_id: int,
     *      amount: float,
     *      description: ?string
     *  }
     */
    public function toArray(): array
    {
        return [
            'campaign_id' => $this->getCampaignId(),
            'user_id' => $this->getUserId(),
            'amount' => $this->getAmount(),
            'description' => $this->getDescription(),
        ];
    }
    public function setCampaignId(int $campaignId): void
    {
        $this->campaign_id = $campaignId;
    }

}
