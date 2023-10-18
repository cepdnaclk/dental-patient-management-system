<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHygiene extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'brushing_tool',
        'toothbrush_type',
        'toothbrush_features',
        'brushing_frequency',
        'supplementry_tool',
        'supplementry_tool_other',
        'toothpaste',
        'toothpaste_other',
        'mouthwash',
        'other',
        'updated_user',
    ];

    public const BRUSHING_TOOLS = [
        'manual' => 'Toothbrush (Manual)',
        'electrical' => 'Toothbrush (Electrical)',
        'no_tool' => 'No Tools'
    ];

    public const BRUSH_TYPE = [
        'hard' => 'Hard',
        'soft' => 'Soft'
    ];

    public const BURSH_FEATURES = [
        'soft_bristles' => 'Soft Bristles',
        'medium_bristals' => 'Medium Bristals',
        'm_shaped' => 'M Shaped Surface',
        'flat' => 'Flat Surface',
        'long_headed' => 'Long Headed'
    ];

    public const BRUSHING_FREQ  = [
        'twice' => 'Twice a day',
        'once' => 'Once a day',
        'more_than_twice' => 'More than twice a day',
        'rarely' => 'Rarely'
    ];

    public const BRUSHING_SUPPORT_TOOL = [
        'dental_floss' => 'Dental Floss',
        'end_tufted_brush' => 'End-tufted Brush',
        'inter_dental_brush' => 'Inter-dental Brush',
        'other' => 'Other'
    ];

    public const BRUSHING_PASTE = [
        'fluoridated' => 'Fluoridated',
        'ayurvedic' => 'Ayurvedic',
        'both' => 'Both',
        'tooth_powder' => 'Tooth Powder',
        'other' => 'Other'
    ];

    public function patient()
    {
        return $this->belongsTo(PatientBasic::class, "patient_id");
    }

    public static function brushing_tools()
    {
        return[
            'manual' => 'Toothbrush (Manual)',
            'electrical' => 'Toothbrush (Electrical)',
            'no_tool' => 'No Tools'
        ];
    }

    public static function toothbrush_types()
    {
        return[
            'hard' => 'Hard',
            'soft' => 'Soft'
        ];
    }

    public static function toothbrush_features()
    {
        return[
            'soft_bristles' => 'Soft Bristles',
            'medium_bristals' => 'Medium Bristals',
            'm_shaped' => 'M Shaped Surface',
            'flat' => 'Flat Surface',
            'long_headed' => 'Long Headed'
        ];
    }

    public static function brushing_freqs()   
    {
        return[
            'twice' => 'Twice a day',
            'once' => 'Once a day',
            'more_than_twice' => 'More than twice a day',
            'rarely' => 'Rarely'
        ];
    }

    public static function supplementry_tools()    
    {
        return[
            'dental_floss' => 'Dental Floss',
            'end_tufted_brush' => 'End-tufted Brush',
            'inter_dental_brush' => 'Inter-dental Brush',
            'other' => 'Other'
        ];
    }

    public static function toothpastes()   
    {
        return[
            'fluoridated' => 'Fluoridated',
            'ayurvedic' => 'Ayurvedic',
            'both' => 'Both',
            'tooth_powder' => 'Tooth Powder',
            'other' => 'Other'
        ];
    }
}
