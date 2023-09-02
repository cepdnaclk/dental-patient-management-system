<?php

namespace App\Http\Controllers\Frontend\Patients;

/**
 * Class PatientEditController.
 */
class PatientEditController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.patients.edit');
    }
}
