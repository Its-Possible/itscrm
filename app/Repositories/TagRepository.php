<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Support\Collection;

class TagRepository {

    private Tag $tag;
    private int $limit = 10;

    public function __construct()
    {
        $this->tag = new Tag();
    }

    public function all(): Collection
    {
        return $this->tag->all();
    }
}
