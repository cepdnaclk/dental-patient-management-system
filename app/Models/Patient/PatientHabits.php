<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHabits extends Model
{
    use HasFactory;

    public const SMOKING_TYPES = [
        'cigarettes' => 'Cigarettes',
        'cigar' => 'Cigar',
        'beedi' => 'Beedi',
        'pipe' => 'Pipe',
        'roll_up' => 'Roll Up',
        'chewing' => 'Chewing'
    ];
    public const SMOKING_FREQ = [
        'ex' => 'Ex-Smoker',
        'lt_10' => '<10 per day',
        'gte_10' => '>10 per day'
    ];

    public const ALCOHOL_FREQ = [
        'daily' => 'Daily',
        'once_a_week' => 'Once a week',
        'a_few_times_a_week' => 'A few times a week',
        'rarely' => 'Rarely'
    ];

    public function patient()
    {
        return $this->belongsTo(PatientBasic::class, "patient_id");
    }
}
