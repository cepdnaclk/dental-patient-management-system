<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientBasic extends Model
{
    use HasFactory;

    public const GUARDIAN_RELATIONSHIPS = [
        'mother' => 'Mother',
        'father' => 'Father',
        'foster' => 'Foster Parent',
        'relative' => 'Family Relative',
    ];

    public function habits()
    {
        return $this->hasOne(PatientHabits::class, 'patient_id');
    }

    public function oral_hygiene()
    {
        return $this->hasOne(PatientHygiene::class, 'patient_id');
    }

    public function getAge()
    {
        // TODO: implement 
    }
}