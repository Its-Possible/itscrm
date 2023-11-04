<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use HasFactory;

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'name', 'slug', 'color'
    ];

    public $timestamps = false;

    public function customers(): BelongsTo
    {
        return $this->belongsToMany(Customer::class, 'tags_customers');
    }

    public function campaigns(): BelongsTo
    {
        return $this->belongsToMany(Campaign::class, 'tags_campaigns');
    }


}
