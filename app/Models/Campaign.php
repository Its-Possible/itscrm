<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Campaign extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'code', 'name', 'subject', 'previewText', 'htmlContent', 'scheduledAt', 'status', 'local'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_campaigns');
    }
}
