<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'subject', 'previewText', 'htmlContent', 'scheduledAt', 'status', 'local'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_campaign');
    }
}
