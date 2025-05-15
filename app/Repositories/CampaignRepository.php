<?php

namespace App\Repositories;

use App\Dto\CampaignDto;
use App\Models\Campaign;
use Illuminate\Pagination\LengthAwarePaginator;

class CampaignRepository
{
    public function all(): LengthAwarePaginator
    {
        return Campaign::with('user')->paginate(10);

    }

    public function find(int $id): ?Campaign
    {
        return Campaign::with('user')->findOrFail($id);
    }

    public function store(CampaignDto $campaignDto): Campaign
    {
        return Campaign::create($campaignDto->toArray());
    }

    public function update(int $id, CampaignDto $campaignDto): ?Campaign
    {
        $campaign = $this->find($id);
        $campaign?->update($campaignDto->toArray());
        return $campaign;
    }

    public function destroy(int $id): ?bool
    {
        return $this->find($id)?->delete();

    }

}
