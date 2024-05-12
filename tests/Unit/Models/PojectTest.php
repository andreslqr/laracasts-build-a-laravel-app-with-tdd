<?php

namespace Tests\Unit\Models;

use App\Models\Project;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PojectTest extends TestCase
{
    #[Test]
    public function it_has_path(): void
    {
        $project = Project::factory()->make();

        $this->assertStringEndsWith("/projects/{$project->getKey()}", $project->path());
    }
}
