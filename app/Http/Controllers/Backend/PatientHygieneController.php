<?php

namespace App\Http\Controllers\Backend;

use App\Models\Patient\PatientHygiene;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Patient\PatientBasic;
use Illuminate\Validation\Rule;

class PatientHygieneController extends Controller
{
    public function index()
    {
        return view('backend.patient_hygiene.index');
    }

    public function create()
    {
        $brushing_tools = PatientHygiene::brushing_tools();     
        $toothbrush_types  = PatientHygiene::toothbrush_types();
        $toothbrush_features  = PatientHygiene::toothbrush_features();
        $brushing_freqs  = PatientHygiene::brushing_freqs();
        $supplementry_tools  = PatientHygiene::supplementry_tools();
        $toothpastes  = PatientHygiene::toothpastes();
        return view('backend.patient_hygiene.create',compact('brushing_tools', 'toothbrush_types', 'toothbrush_features', 'brushing_freqs', 'supplementry_tools', 'toothpastes'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */

     public function store(Request $request)
     {;
        $data = $request->validate([
            'patient_id' => 'required|exists:patient_basics,id',
            'brushing_tool' => ['required', 'in:' . implode(',', array_keys(PatientHygiene::BRUSHING_TOOLS))],
            'toothbrush_type' => ['required', 'in:' . implode(',', array_keys(PatientHygiene::BRUSH_TYPE))],
            'toothbrush_features' => ['required', 'in:' . implode(',', array_keys(PatientHygiene::BURSH_FEATURES))],
            'brushing_frequency' => ['required', 'in:' . implode(',', array_keys(PatientHygiene::BRUSHING_FREQ))],
            'supplementry_tool' => ['required', 'in:' . implode(',', array_keys(PatientHygiene::BRUSHING_SUPPORT_TOOL))],
            'supplementry_tool_other' => 'nullable|string',
            'toothpaste' => ['required', 'in:' . implode(',', array_keys(PatientHygiene::BRUSHING_PASTE))],
            'toothpaste_other' => ['required', 'in:' . implode(',', array_keys(PatientHygiene::BRUSHING_PASTE))],
            'mouthwash' => 'required|boolean',
            'other' => 'nullable|string',
            'updated_user' => 'required|exists:users,id',
        ]); 
     
        try {
             $data['update_user']=auth()->id();;
             $patientHygiene = new PatientHygiene($data);
             $patientHygiene->save();
     
             return redirect()->route('admin.patient_hygiene.index')->with('success', 'Patient details were created successfully.');
        } catch (\Exception $ex) {
             // Handle exceptions, such as database errors
             dd($ex);
            //  return redirect()->route('admin.patient_habit.edit', $patientHabit)->with('error', 'An error occurred while storing the patient details.');
        }
    }

    public function edit(PatientHygiene $patientHygiene)
    {
        return view('backend.patient_hygiene.edit', compact('patientHygiene'));
    }

    public function update(Request $request, PatientHygiene $patientHygiene)
    {
        $data = $request->validate([
            //'patient_id' => 'required|exists:patient_hygienes,patient_id' . $patientHygiene->id,
            'other' => 'string|required',
            
        ]);
    
        try {
            $patientHygiene->update($data);
    
            return redirect()->route('admin.patient_hygiene.index')->with('success', 'Patient details were updated successfully.');
        } catch (\Exception $ex) {
            // Handle exceptions, such as database errors
            dd($ex);
            //return redirect()->route('admin.patient_habit.edit', $patientHabits)->with('error', 'An error occurred while updating the patient details.');
        }
    }

    public function delete(PatientHygiene $patientHygiene)
    {
        return view('backend.patient_hygiene.delete', compact('patientHygiene'));
    }

    public function destroy(PatientHygiene $patientHygiene)
    {
        try {
            $patientHygiene->delete();
            return redirect()->route('admin.patient_hygiene.index')->with('success', 'Patient Habits record was deleted successfully!');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }
}
