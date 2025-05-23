<?php

namespace Database\Seeders;

use App\Models\Donation;
use Database\Factories\DonationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donation::factory(10)->create();
    }
}
