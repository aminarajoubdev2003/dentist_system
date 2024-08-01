<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'rate',
        'comment'
    ];

    public function doctor(): object
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): object
    {
        return $this->belongsTo(Patient::class);
    }
    
}
