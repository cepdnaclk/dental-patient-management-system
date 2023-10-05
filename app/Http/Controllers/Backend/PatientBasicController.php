<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient\PatientBasic;
use Illuminate\Validation\Rule;

class PatientBasicController extends Controller
{
    public function index()
    {
        return view('backend.patient_basic.index');
    }

//pasan made
    public function create()
    {
        $genders = PatientBasic::genders();
        $ethnicities = PatientBasic::ethnicities();
        $honorifics = PatientBasic::honorifics();
        $districts = PatientBasic::districts();
        $guardian_relationships = PatientBasic::guardian_relationships();
        return view('backend.patient_basic.create',compact('genders','ethnicities','honorifics','districts','guardian_relationships'));
    }

    //pasan made
    
    public function store(Request $request)
{;
    $data = $request->validate([
        'reg_number' => 'required|string|unique:patient_basics,reg_number|max:8',
        'name' => 'required|string',
        'dob' => 'required|date',
        'initial_visit' => 'required|date',
        'gender' => ['required', Rule::in(array_keys(config('enums.gender')))],
        'ethinicity' => 'nullable|in:' . implode(',', array_keys(config('enums.ethinicity'))),
        'honorific' => 'nullable|in:' . implode(',', array_keys(config('enums.honorific'))),
        'district' => 'nullable|in:' . implode(',', array_keys(config('enums.district'))),
        'contact_address' => 'nullable|string',
        'contact_tele' => 'nullable|string|max:12',
        'guardian_name' => 'nullable|string',
        'guardian_tele' => 'nullable|string|max:12',
        'guardian_address' => 'nullable|string',
        'guardian_relationship' => 'nullable|in:' . implode(',', array_keys(PatientBasic::GUARDIAN_RELATIONSHIPS)),
        'presenting_complain_co' => 'nullable|string',
        'presenting_complain_ho' => 'nullable|string',
        'medical_history' => 'nullable|string',
        'current_medications' => 'nullable|string',
        'special_referrals' => 'nullable|string',
       
    ]); 

    try {
        $patientBasic = new PatientBasic($data);
        $patientBasic->save();

        return redirect()->route('admin.patient_basic.index')->with('success', 'Patient details were created successfully.');
    } catch (\Exception $ex) {
        // Handle exceptions, such as database errors
       print_r('This is a error');
    }
}


    public function edit(PatientBasic $patientBasic)
    {
        $gender = PatientBasic::genders();
        return view('backend.patient_basic.edit', compact('patientBasic','genders'));
    }

    public function update(Request $request, PatientBasic $patientBasic)
    {
        $data = $request->validate([
            'reg_number' => 'required|string|unique:patient_basics,reg_number,' . $patientBasic->id,
            'name' => 'required|string',
            'dob' => 'required|date',
            'initial_visit' => 'required|date',
            'gender' => ['required', Rule::in(array_keys(config('enums.gender')))],
            'ethinicity' => 'nullable|in:' . implode(',', array_keys(config('enums.ethinicity'))),
            'honorific' => 'nullable|in:' . implode(',', array_keys(config('enums.honorific'))),
            'district' => 'nullable|in:' . implode(',', array_keys(config('enums.district'))),
            'contact_address' => 'nullable|string',
            'contact_tele' => 'nullable|string|max:12',
            'guardian_name' => 'nullable|string',
            'guardian_tele' => 'nullable|string|max:12',
            'guardian_address' => 'nullable|string',
            'guardian_relationship' => 'nullable|in:' . implode(',', array_keys(PatientBasic::GUARDIAN_RELATIONSHIPS)),
            'presenting_complain_co' => 'nullable|string',
            'presenting_complain_ho' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'special_referrals' => 'nullable|string',
        ]);
    
        try {
            $patientBasic->update($data);
    
            return redirect()->route('admin.patient_basic.index')->with('success', 'Patient details were updated successfully.');
        } catch (\Exception $ex) {
            // Handle exceptions, such as database errors
            return redirect()->route('admin.patient_basic.edit', $patientBasic)->with('error', 'An error occurred while updating the patient details.');
        }
    }
    

    public function delete(PatientBasic $patientBasic)
    {
        return view('backend.patient_basic.delete', compact('patientBasic'));
    }

    public function destroy(PatientBasic $patientBasic)
    {
    }
}