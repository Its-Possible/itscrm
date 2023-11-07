<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Customer extends Model
{
    use HasFactory;

    public function avatar(): HasOne
    {
        return $this->hasOne(Avatar::class, 'id', 'avatar_id');
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, 'customer_doctor', 'customer_id', 'id');
    }

    public function specialities(): BelongsToMany
    {
        return $this->belongsToMany(Speciality::class, 'customer_speciality', 'customer_id','id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_customer', 'tag_id', 'customer_id', 'id', 'id');
    }
}
