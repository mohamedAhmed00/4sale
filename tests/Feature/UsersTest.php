<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsersTest extends TestCase
{
    public function testListUsers(): void
    {
        $response = $this->get('/api/v1/users');
        $response->assertStatus(200);
        $this->assertEquals(22, count(json_decode($response->getContent())));
        $response->assertJsonStructure(['*' => [
            'balance', 'currency', 'email', 'status', 'created_at', 'id',
        ]]);
    }

    public function testListUsersFilterByBalance(): void
    {
        $response = $this->get('/api/v1/users?balanceMin=800&balanceMax=900');
        $response->assertStatus(200);
        $this->assertEquals(2, count(json_decode($response->getContent())));
    }

    public function testListUsersFilterByCurrency(): void
    {
        $response = $this->get('/api/v1/users?currency=usd');
        $response->assertStatus(200);
        $this->assertEquals(11, count(json_decode($response->getContent())));
    }

    public function testListUsersFilterByStatus(): void
    {
        $response = $this->get('/api/v1/users?status=decline');
        $response->assertStatus(200);
        $this->assertEquals(5, count(json_decode($response->getContent())));
    }

    public function testListUsersApplyAllFilters(): void
    {
        $response = $this->get('/api/v1/users?status=decline&currency=usd&balanceMin=700&balanceMax=900');
        $response->assertStatus(200);
        $this->assertEquals(1, count(json_decode($response->getContent())));
    }
}
