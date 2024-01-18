<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    public function taggable(): MorphTo
    {
        return $this->morphTo();
    }

    public function campaigns(): MorphToMany
    {
        return $this->morphedByMany(Campaign::class, 'taggable');
    }
}
