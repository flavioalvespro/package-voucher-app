<?php

namespace Tests\Feature\Api;

use App\Models\Voucher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VoucherTest extends TestCase
{
    /**
     * test for get all clients
     *
     * @return void
     */
    public function testGetVoucherByEmail()
    {
        $voucher = factory(Voucher::class)->create();
        
        $response = $this->getJson("/api/v1/vouchers/{$voucher->client->email}");

        $response->assertStatus(200);
    }
}
