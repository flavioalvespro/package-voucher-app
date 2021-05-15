<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * test for get all clients
     *
     * @return void
     */
    public function testGetAllClients()
    {
        $response = $this->getJson('/api/v1/clients');

        $response->assertStatus(200);
    }
}
