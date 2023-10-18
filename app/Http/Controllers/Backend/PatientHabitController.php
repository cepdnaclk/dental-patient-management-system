<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Patient\PatientHabits;

use Illuminate\Http\Request;
use App\Models\Patient\PatientBasic;
use Illuminate\Validation\Rule;

class PatientHabitController extends Controller
{
    //
    public function index()
    {
        return view('backend.patient_habit.index');
    }

    public function create()
    {
        $smoking_types = PatientHabits::smoking_types();
        $smoking_freq  = PatientHabits::smoking_freq();
        $alcohol_freq  = PatientHabits::alcohol_freq();
        return view('backend.patient_habit.create',compact('smoking_types', 'smoking_freq', 'alcohol_freq'));
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
            'smoking' => ['required', 'in:' . implode(',', array_keys(PatientHabits::SMOKING_TYPES))],
            'smoking_frequency' => ['required', 'in:' . implode(',', array_keys(PatientHabits::SMOKING_FREQ))],
            'smoking_duration' => 'required|integer|min:0|max:100',
            'ex_smoking_duration' => 'nullable|integer|min:0|max:100',
            'betal_chewing' => 'required|boolean',
            'betal_chewing_tabacco' => 'required|boolean',
            'betal_chewing_details' => 'nullable|string',
            'smokeless_tabaco' => 'required|boolean',
            'alcohol' => 'required|boolean',
            'alcohol_frequency' => ['required', 'in:' . implode(',', array_keys(PatientHabits::ALCOHOL_FREQ))],
            'alcohol_duration' => 'required|integer|min:0|max:100',
            'other' => 'nullable|string',
            'updated_user' => 'required|exists:users,id',
        ]); 
     
        try {
             $data['update_user']=auth()->id();;
             $patientHabit = new PatientHabits($data);
             $patientHabit->save();
     
             return redirect()->route('admin.patient_habit.index')->with('success', 'Patient details were created successfully.');
        } catch (\Exception $ex) {
             // Handle exceptions, such as database errors
             dd($ex);
            //  return redirect()->route('admin.patient_habit.edit', $patientHabit)->with('error', 'An error occurred while storing the patient details.');
        }
    }

    public function edit(PatientHabits $patientHabits)
    {
        return view('backend.patient_habit.edit', compact('patientHabits'));
    }

    public function update(Request $request, PatientHabits $patientHabits)
    {
        $data = $request->validate([
            //'id' => 'required|exists:patient_habits,id' . $patientHabits->id,
            'other' => 'string|required',
            
        ]);
    
        try {
            $patientHabits->update($data);
    
            return redirect()->route('admin.patient_habit.index')->with('success', 'Patient details were updated successfully.');
        } catch (\Exception $ex) {
            // Handle exceptions, such as database errors
            dd($ex);
            //return redirect()->route('admin.patient_habit.edit', $patientHabits)->with('error', 'An error occurred while updating the patient details.');
        }
    }
    

    public function delete(PatientHabits $patientHabits)
    {
        return view('backend.patient_habit.delete', compact('patientHabits'));
    }

    public function destroy(PatientHabits $patientHabits)
    {
        try {
            $patientHabits->delete();
            return redirect()->route('admin.patient_habit.index')->with('success', 'Patient Habits record was deleted successfully!');
        } catch (\Exception $ex) {
            return abort(500);
        }
    }
}
