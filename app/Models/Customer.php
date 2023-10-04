<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    use HasFactory;

    public function avatar()
    {
        return $this->hasOne(Avatar::class, 'id', 'avatar_id');
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tags_customers', 'customer_id', 'id');
    }
}
