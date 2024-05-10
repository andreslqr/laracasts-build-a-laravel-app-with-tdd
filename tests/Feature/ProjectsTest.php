<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    #[Test]
    public function a_user_can_create_a_project(): void
    {
        $this->withExceptionHandling();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph()
        ];

        $response = $this->post('/projects', $attributes);

        // $response->assertStatus(201);

        $this->assertDatabaseHas('projects', $attributes);
    }
}
