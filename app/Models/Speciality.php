<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Comment\Doc;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    protected $hidden = [
        'id'
    ];

    public function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }
}
