<?php

namespace App\Repositories;

use App\Dto\DonationDto;
use App\Models\Donation;

class DonationRepository
{
    public function find(Donation $donation): ?Donation
    {
        return Donation::with('user', 'campaign')->findOrFail($donation);
    }

    public function store(DonationDto $donationDto): Donation
    {
        return Donation::create($donationDto->toArray());
    }
}
