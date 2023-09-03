<?php

namespace App\Http\Controllers\Frontend\Patients;

/**
 * Class PatientViewController.
 */
class PatientViewController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.patients.index');
    }
}
