<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    protected $hidden = [
        'id'
    ];

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class,  'doctor_speciality');
    }
}
