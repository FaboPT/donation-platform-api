<?php

use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a campaign', function () {
    $campaign = Campaign::factory()->create();

    expect($campaign)->toBeInstanceOf(Campaign::class)
                     ->name->toBeString()
                     ->description->toBeNullOrString()
                     ->goal_amount->toBeNullOrFloat()
                     ->current_amount->toBeFloat()
                     ->start_date->toBeString()
                     ->end_date->toBeNullOrString()
                     ->user_id->toBeNullOrInt()
                     ->status->toBeNullOrString();
});

it('can update a campaign', function () {
    $campaign = Campaign::factory()->create();

    $campaign->update(['name' => 'Updated Campaign']);

    expect($campaign->fresh()->name)->toBe('Updated Campaign');
});

it('can delete a campaign', function () {
    $campaign = Campaign::factory()->create();

    $campaign->delete();

    expect(Campaign::find($campaign->id))->toBeNull();
});

it('can retrieve campaigns', function () {
    Campaign::factory()->count(3)->create();

    $campaigns = Campaign::all();

    expect($campaigns)->toHaveCount(3);
});
