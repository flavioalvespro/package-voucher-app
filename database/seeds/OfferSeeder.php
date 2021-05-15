<?php

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::create([
            'name' => 'Power Offer',
            'percentage_discount' => 20
        ]);
    }
}
