<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'when',
        'status'
    ];

    public function doctor(): object
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): object
    {
        return $this->belongsTo(Patient::class);
    }

    public function treatment(): object
    {
        return $this->hasOne(Treatment::class);
    }

}
