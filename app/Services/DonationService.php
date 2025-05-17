<?php

namespace App\Services;

use App\Dto\DonationDto;
use App\Models\Donation;
use App\Repositories\CampaignRepository;
use App\Repositories\DonationRepository;
use Illuminate\Support\Facades\DB;

class DonationService
{
    public function __construct(
        private readonly DonationRepository $donationRepository,
        private readonly CampaignRepository $campaignRepository,
    ) {
    }

    public function donate(int $campaignId, DonationDto $donationDto): Donation
    {

        return DB::transaction(function() use ($donationDto, $campaignId) {
            $campaign = $this->campaignRepository->find($campaignId);
            if (!$campaign) {
                throw new \Exception('Campaign not found');
            }
            $donationDto->setCampaignId($campaignId);
            return $this->donationRepository->store($donationDto);
        });
    }

    public function show(Donation $donation): ?Donation
    {
        return $this->donationRepository->find($donation);
    }
}
