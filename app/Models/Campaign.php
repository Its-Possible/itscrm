<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'name', 'subject', 'previewText', 'htmlContent', 'scheduledAt', 'status', 'local'
    ];
}
