<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;

    public function avatar(): HasOne
    {
        return $this->hasOne(Avatar::class, 'id', 'avatar_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function birthdayToday(): Builder
    {
        return self::whereMonth("birthday", now()->month)
            ->whereDay("birthday", now()->day);
    }

    public static function birthdayThisWeek(): Builder {
        return self::whereDay("birthday", '>=', now()->day)
            ->whereDay("birthday", '<=', now()->addWeek()->day)
            ->whereMonth("birthday", now()->month);
    }

    public static function birthdayThisMonth(): Builder
    {
        return self::whereMonth("birthday", now()->month);
    }
}
