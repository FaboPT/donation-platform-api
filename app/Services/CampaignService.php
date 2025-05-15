<?php

namespace App\Services;

use App\Dto\CampaignDto;
use App\Models\Campaign;
use App\Repositories\CampaignRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class CampaignService
{

    public function __construct(private readonly CampaignRepository $campaignRepository)
    {
    }

    public function all(): LengthAwarePaginator
    {
        return $this->campaignRepository->all();
    }

    public function store(CampaignDto $campaignDto): Campaign
    {
        return DB::transaction(function() use ($campaignDto) {
            return $this->campaignRepository->store($campaignDto);
        });
    }

    public function show(int $id): Campaign
    {
        return $this->campaignRepository->find($id);
    }

    public function update(int $id, CampaignDto $campaignDto): Campaign
    {
        return DB::transaction(function() use ($id, $campaignDto) {
            return $this->campaignRepository->update($id, $campaignDto);
        });

    }

    public function destroy(int $id): ?bool
    {
        return DB::transaction(function() use ($id) {
            return $this->campaignRepository->destroy($id);
        });
    }
}
