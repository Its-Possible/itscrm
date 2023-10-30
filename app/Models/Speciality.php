<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use PhpParser\Comment\Doc;

class Speciality extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name', 'description'
    ];

    protected $hidden = [
        'id'
    ];

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class,  'doctor_specialities');
    }
}
