<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'born'
    ];

    public function reviews(): object
    {
        return $this->hasMany(Review::class);
    }

    public function appointments(): object
    {
        return $this->hasMany(Appointment::class);
    }
}
