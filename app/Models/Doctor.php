<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'specialization_id'
    ];

    public function specialization(): object
    {
        return $this->belongsTo(Specialization::class);
    }

    public function reviews(): object
    {
        return $this->hasMany(Review::class);
    }

    public function appointments(): object
    {
        return $this->hasMany(Appointment::class);
    }
}
