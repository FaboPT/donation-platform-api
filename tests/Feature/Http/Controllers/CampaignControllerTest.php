<?php

use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can retrieve a list of campaigns', function () {
    Campaign::factory()->count(5)->create();

    $response = $this->getJson('/api/campaigns');

    $response->assertOk()
             ->assertJsonCount(5, 'data');
});

it('can create a new campaign', function () {
    $data = [
        'name' => 'New Campaign',
        'description' => 'Campaign description',
    ];

    $response = $this->postJson('/api/campaigns', $data);

    $response->assertCreated()
             ->assertJsonPath('data.name', 'New Campaign');
});

it('can update a campaign', function () {
    $campaign = Campaign::factory()->create();

    $data = [
        'name' => 'Updated Campaign',
    ];

    $response = $this->putJson("/api/campaigns/{$campaign->id}", $data);

    $response->assertOk()
             ->assertJsonPath('data.name', 'Updated Campaign');
});

it('can delete a campaign', function () {
    $campaign = Campaign::factory()->create();

    $response = $this->deleteJson("/api/campaigns/{$campaign->id}");

    $response->assertNoContent();
});
