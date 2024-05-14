<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_user_can_create_a_project(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $attributes = Project::factory()->raw([
            'owner_id' => $user->getKey()
        ]);

        $this->post('/projects', $attributes);

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function guest_cannot_view_projects()
    {
        $this->get('/projects')->assertRedirect('login');
    }

    #[Test]
    public function a_user_can_view_a_project(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $project = Project::factory()->create([
            'owner_id' => $user->getKey()
        ]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    #[Test]
    public function a_project_requires_a_title(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $attributes = Project::factory()->raw([
            'title' => null,
        ]);


        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    #[Test]
    public function guests_cannot_create_projects(): void
    {
        $attributes = Project::factory()->raw([
            'owner_id' => null
        ]);

        $this->post('/projects', $attributes)->assertRedirect('login');
    }

    #[Test]
    public function guests_cannot_view_a_single_project(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $project = Project::factory()->create();

        $this->get($project->path())
            ->assertStatus(403);
    }

    #[Test]
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $project = Project::factory()->create();

        $this->get($project->path())->assertStatus(403);
    }
}
