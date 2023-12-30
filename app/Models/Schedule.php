<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "description", "command", "schedule_at", "last_executed_at", "next_executed_last", "execution_interval", "completed"
    ];

    protected $hidden = [
        "id", "author_id"
    ];
}
