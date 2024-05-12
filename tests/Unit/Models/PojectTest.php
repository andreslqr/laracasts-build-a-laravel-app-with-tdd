<?php

namespace Tests\Unit\Models;

use App\Models\Project;
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
}
