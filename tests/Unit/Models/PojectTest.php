<?php

namespace Tests\Unit\Models;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PojectTest extends TestCase
{
    use RefreshDatabase;
    
    #[Test]
    public function it_has_path(): void
    {
        $project = Project::factory()->create();

        $this->assertStringEndsWith("/projects/{$project->getKey()}", $project->path());
    }

    #[Test]
    public function it_belongs_to_an_owner(): void
    {
        $project = Project::factory()->create();

        $this->assertInstanceOf(User::class, $project->owner);
    }
}
