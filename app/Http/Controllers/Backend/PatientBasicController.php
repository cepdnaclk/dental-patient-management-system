<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient\PatientBasic;

class PatientBasicController extends Controller
{
    public function index()
    {
        return view('backend.patient_basic.index');
    }


    public function create()
    {
        return view('backend.patient_basic.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.patient_basic.index')->with('Success', 'Record was created !');
    }


    public function edit(PatientBasic $patientBasic)
    {
        return view('backend.patient_basic.edit', compact('patientBasic'));
    }

    public function update(Request $request, PatientBasic $patientBasic)
    {
        return redirect()->route('admin.patient_basic.index')->with('Success', 'Record was updated !');
    }

    public function delete(PatientBasic $patientBasic)
    {
        return view('backend.patient_basic.delete', compact('patientBasic'));
    }

    public function destroy(PatientBasic $patientBasic)
    {
    }
}
