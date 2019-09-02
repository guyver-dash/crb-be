<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanTest extends TestCase
{
    public function testExample()
    {
        $response = $this->json('POST', '/api/account', [
            "branch_id" => 7,
            "information_id" => 3,
            "savings_id" => 1,
            "status" => 0
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);


        $response = $this->json('POST', '/api/collector', [
                "information_id" => 4,
                "branch_id" => 2,
                "imei" => 122333
            ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true
            ]);
    }
}
