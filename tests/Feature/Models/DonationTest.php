<?php

use App\Models\Donation;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a donation', function () {
    $donation = Donation::factory()->create();

    expect($donation)->toBeInstanceOf(Donation::class)
                     ->amount->toBeFloat()
                     ->campaign_id->toBeInt()
                     ->donor_name->toBeString()
                     ->created_at->toBeInstanceOf(\Illuminate\Support\Carbon::class)
                     ->updated_at->toBeInstanceOf(\Illuminate\Support\Carbon::class);
});

it('can update a donation', function () {
    $donation = Donation::factory()->create();

    $donation->update(['amount' => 200.00]);

    expect($donation->fresh()->amount)->toBe(200.00);
});

it('can delete a donation', function () {
    $donation = Donation::factory()->create();

    $donation->delete();

    expect(Donation::find($donation->id))->toBeNull();
});

it('can retrieve donations', function () {
    Donation::factory()->count(3)->create();

    $donations = Donation::all();

    expect($donations)->toHaveCount(3);
});
