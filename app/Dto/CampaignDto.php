<?php

namespace App\Dto;

use App\Http\Requests\Campaign\StoreCampaignRequest;
use App\Http\Requests\Campaign\UpdateCampaignRequest;

class CampaignDto
{
    public function __construct(
        private readonly string  $name,
        private readonly ?string $description,
        private readonly ?float  $goalAmount,
        private readonly float   $currentAmount,
        private readonly string  $startDate,
        private readonly string  $endDate,
        private readonly int     $userId,
        private readonly ?string $status
    ) {
    }

    /**
     * @param UpdateCampaignRequest[]|StoreCampaignRequest[] $data
     * @return CampaignDto
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['description'] ?? null,
            $data['goal_amount'] ?? null,
            $data['current_amount'],
            $data['start_date'],
            $data['end_date'] ?? null,
            $data['user_id'],
            $data['status'] ?? null,
        );
    }
    public static function fromRequest(StoreCampaignRequest|UpdateCampaignRequest $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('description'),
            $request->input('goal_amount'),
            $request->input('current_amount'),
            $request->input('start_date'),
            $request->input('end_date'),
            $request->input('user_id'),
            $request->input('status'),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'goal' => $this->getGoalAmount(),
            'current_amount' => $this->getCurrentAmount(),
            'start_date' => $this->getStartDate(),
            'end_date' => $this->getEndDate(),
            'user_id' => $this->getUserId(),
            'status' => $this->getStatus(),
        ];
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getGoalAmount(): ?float
    {
        return $this->goalAmount;
    }

    public function getCurrentAmount(): float
    {
        return $this->currentAmount;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }

}
