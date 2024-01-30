<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $hidden = [
        "id", "vat", "website"
    ];

    public function avatar(): HasOne
    {
        return $this->hasOne(Avatar::class, 'id', 'avatar_id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public static function birthdayToday(): Customer
    {
        return self::whereMonth("birthday", now()->month)
            ->whereDay("birthday", now()->day);
    }

    public static function birthdayThisWeek(): Customer
    {
        return self::whereDay("birthday", '>=', now()->day)
            ->whereDay("birthday", '<=', now()->addWeek()->day)
            ->whereMonth("birthday", now()->month);
    }

    public static function birthdayThisMonth(): Customer
    {
        return self::whereMonth("birthday", now()->month);
    }
}
