<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAll()
    {
        $response = $this->get('/api/v1/items');
        $response->assertStatus(200);
    }
}
