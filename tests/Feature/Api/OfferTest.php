<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfferTest extends TestCase
{
    /**
     * test for get all clients
     *
     * @return void
     */
    public function testGetAllOffers()
    {
        $response = $this->getJson('/api/v1/offers');

        $response->assertStatus(200);
    }
}
