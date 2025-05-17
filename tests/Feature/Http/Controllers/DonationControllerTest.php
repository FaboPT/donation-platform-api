 <?php

use App\Models\Donation;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can retrieve a list of donations', function () {
    Donation::factory()->count(5)->create();

    $response = $this->getJson('/api/donations');

    $response->assertOk()
             ->assertJsonCount(5, 'data');
});

it('can create a new donation', function () {
    $data = [
        'amount' => 100.00,
        'campaign_id' => 1,
        'donor_name' => 'John Doe',
    ];

    $response = $this->postJson('/api/donations', $data);

    $response->assertCreated()
             ->assertJsonPath('data.amount', 100.00);
});

it('can update a donation', function () {
    $donation = Donation::factory()->create();

    $data = [
        'amount' => 150.00,
    ];

    $response = $this->putJson("/api/donations/{$donation->id}", $data);

    $response->assertOk()
             ->assertJsonPath('data.amount', 150.00);
});

it('can delete a donation', function () {
    $donation = Donation::factory()->create();

    $response = $this->deleteJson("/api/donations/{$donation->id}");

    $response->assertNoContent();
});
