<?php

namespace App\Http\Controllers;

use App\Dto\CampaignDto;
use App\Http\Requests\Campaign\StoreCampaignRequest;
use App\Http\Requests\Campaign\UpdateCampaignRequest;
use App\Http\Resources\CampaignResource;
use App\Models\Campaign;
use App\Services\CampaignService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CampaignController extends Controller
{
    public function __construct(private readonly CampaignService $campaignService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $campaigns = $this->campaignService->all();
        return CampaignResource::collection($campaigns);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCampaignRequest $request): CampaignResource
    {
        $campaignDto = CampaignDto::fromArray($request->all());
        $campaign = $this->campaignService->store($campaignDto);
        return new CampaignResource($campaign);
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign): CampaignResource
    {
        $campaign = $this->campaignService->show($campaign->__get('id'));
        return new CampaignResource($campaign);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign): CampaignResource
    {
        $campaign = $this->campaignService->update(
            $campaign->__get('id'),
            CampaignDto::fromArray($request->all())
        );

        return new CampaignResource($campaign);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign): JsonResponse
    {
        $this->campaignService->destroy($campaign->__get('id'));

        return response()->json([
            'message' => 'Campaign deleted successfully',
        ]);
    }
}
