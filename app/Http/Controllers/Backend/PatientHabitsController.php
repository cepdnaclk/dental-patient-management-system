<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient\PatientHabits;


class PatientHabitsController extends Controller
{
    public function index()
    {
        return view('backend.patient_habits.index');
    }


    public function create()
    {
        return view('backend.patient_habits.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.patient_habits.index')->with('Success', 'Record was created !');
    }


    public function edit(PatientHabits $patientHabits)
    {
        return view('backend.patient_habits.edit', compact('patientHabits'));
    }

    public function update(Request $request, PatientHabits $patientHabits)
    {
        return redirect()->route('admin.patient_habits.index')->with('Success', 'Record was updated !');
    }

    public function delete(PatientHabits $patientHabits)
    {
        return view('backend.patient_habits.delete', compact('patientHabits'));
    }

    public function destroy(PatientHabits $patientHabits)
    {
    }
}
