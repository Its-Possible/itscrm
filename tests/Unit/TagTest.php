<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function testCreateTag(): void
    {
        $tag = Tag::factory()->create([
            'name' => "Aniversário",
            'slug' => "aniversario",
            'color' => "#ff0000"
        ]);

        $this->assertDatabaseHas('tags', [
            'name' => 'Aniversário',
            'slug' => 'aniversario'
        ]);
    }
}
