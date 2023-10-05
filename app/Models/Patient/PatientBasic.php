<?php

namespace App\Models\Patient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientBasic extends Model
{
    use HasFactory;
    protected $fillable = [
        'reg_number',
        'name',
        'dob',
        'initial_visit',
        'gender',
        'ethinicity', 
        'honorific',   
        'district',   
        'contact_address',
        'contact_tele' ,
        'guardian_name' ,
        'guardian_tele' ,
        'guardian_address' ,
        'guardian_relationship',
        'presenting_complain_co' ,
        'presenting_complain_ho' ,
        'medical_history',
        'current_medications',
        'special_referrals' , 
       
    ];

    public const GUARDIAN_RELATIONSHIPS = [
        'mother' => 'Mother',
        'father' => 'Father',
        'foster' => 'Foster Parent',
        'relative' => 'Family Relative',
    ];

    //pasan made
    protected $dates=[
        'dob',
        'initial_visit',
    ];
    //

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

    //pasan made
    public static function genders()
    {
        return [
            'male'=>'Male',
            'female'=>'Female',
            'other'=>'Other',
        ];
    }  

    public static function ethnicities()
    {
        return[
        'sinhala' => "Sinhala",
        'tamil' => "Tamil",
        'muslim' => "Muslim",
        'burgher' => "Burgher",
        'malay' => "Malay",
        'other' => "Other",
        ];
    }

    public static function honorifics()
    {
        return[
            'mr' => "Mr.",
            'mrs' => "Mrs.",
            'miss' => "Miss.",
            'rev' => "Rev.",
        ];
    }

    public static function districts()
    {
        return[
            '1' => 'Colombo',
            '2' => 'Gampaha',
            '3' => 'Kalutara',
            '4' => 'Kandy',
            '5' => 'Matale',
            '6' => 'Nuwara Eliya',
            '7' => 'Galle',
            '8' => 'Matara',
            '9' => 'Hambantota',
            '10' => 'Jaffna',
            '11' => 'Kilinochchi',
            '12' => 'Mannar',
            '13' => 'Vavuniya',
            '14' => 'Mullaitivu',
            '15' => 'Batticaloa',
            '16' => 'Ampara',
            '17' => 'Trincomalee',
            '18' => 'Kurunegala',
            '19' => 'Puttalam',
            '20' => 'Anuradhapura',
            '21' => 'Polonnaruwa',
            '22' => 'Badulla',
            '23' => 'Moneragala',
            '24' => 'Ratnapura',
            '25' => 'Kegalle',
        ];
    }

    public static function guardian_relationships()
    {
        return[
            'mother' => 'Mother',
            'father' => 'Father',
            'foster' => 'Foster Parent',
            'relative' => 'Family Relative',
        ];
    }

    public static function entered_bys()
    {
        return[
            'doctor'=>'Doctor',
            'medicle student'=>'Medicle Student',
            'patient'=>'Patient',
            'other'=>'Other',
        ];
    }
}