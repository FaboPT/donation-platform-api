<?php

namespace App\Http\Controllers;

use App\Dto\DonationDto;
use App\Http\Requests\Donation\StoreDonationRequest;
use App\Http\Resources\DonationResource;
use App\Models\Campaign;
use App\Models\Donation;
use App\Services\DonationService;

class DonationController extends Controller
{

    public function __construct(private readonly DonationService $donationService)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function donate(StoreDonationRequest $request, Campaign $campaign): DonationResource
    {
        $request->merge(['user_id' => $request->user()?->getAuthIdentifier()]);
        $campaignId = $campaign->__get('id');
        $donationDto = DonationDto::fromArray($request->all());

        $donation = $this->donationService->donate($campaignId, $donationDto);

        return new DonationResource($donation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        $donation = $this->donationService->show($donation);

        return new DonationResource($donation);
    }
}
