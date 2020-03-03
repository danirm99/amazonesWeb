<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_user_can_browse_tasks()
    {
        $response = $this->get('/ct/Pantallas/HI00001');

        $response->assertStatus(200);
    }
}
