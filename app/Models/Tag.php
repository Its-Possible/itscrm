<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, 'tag_customer');
    }

    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(Campaign::class, 'tag_campaign');
    }


}
