<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
      'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
