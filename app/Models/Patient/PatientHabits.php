<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHabits extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'smoking',
        'smoking_frequency',
        'smoking_duration',
        'ex_smoking_duration',
        'betal_chewing',
        'betal_chewing_tabacco',
        'betal_chewing_details',
        'smokeless_tabaco',
        'alcohol',
        'alcohol_frequency',
        'alcohol_duration',
        'other',
        'updated_user',
    ];

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

    public static function smoking_types()
    {
        return[
            'cigarettes' => 'Cigarettes',
            'cigar' => 'Cigar',
            'beedi' => 'Beedi',
            'pipe' => 'Pipe',
            'roll_up' => 'Roll Up',
            'chewing' => 'Chewing'
        ];
    }

    public static function smoking_freq()
    {
        return[
            'ex' => 'Ex-Smoker',
            'lt_10' => '<10 per day',
            'gte_10' => '>10 per day'
        ];
    }

    public static function alcohol_freq()
    {
        return[
            'daily' => 'Daily',
            'once_a_week' => 'Once a week',
            'a_few_times_a_week' => 'A few times a week',
            'rarely' => 'Rarely'
        ];
    }
}
