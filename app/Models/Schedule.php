<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "description", "command", "schedule_at", "last_executed_at", "next_executed_last", "execution_interval", "completed"
    ];

    protected $hidden = [
        "id", "author_id"
    ];

    public function campaigns(): MorphToMany
    {
        return $this->morphToMany(Campaign::class, 'campaignable');
    }
}
