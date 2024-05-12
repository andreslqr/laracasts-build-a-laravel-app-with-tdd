<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_user_can_create_a_project(): void
    {
        $attributes = Project::factory()->raw();

        $this->post('/projects', $attributes);

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    #[Test]
    public function a_user_can_view_a_project()
    {
        $project = Project::factory()->create();

        $this->get("/projects/{$project->getKey()}")
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    #[Test]
    public function a_project_requires_a_title(): void
    {
        $attributes = Project::factory()->raw([
            'title' => null
        ]);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }
}
