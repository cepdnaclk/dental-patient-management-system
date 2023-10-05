<?php

use App\Http\Controllers\LocaleController;
use App\Models\Patient\PatientBasic;
/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});

//pasn made
Route::get('/create',function(){
    return view('create');
});

//pasan made
Route::post('/create',function(){
    $patient_basic = new PatientBasic();
    $patient_basic -> reg_number=request('reg_number');
    $patient_basic -> name=request('name');
    $patient_basic -> dob=request('dob');
    $patient_basic -> initial_visit=request('initial_visit');
    $patient_basic -> gender=request('gender');
    $patient_basic -> ethinicity=request('ethinicity');
    $patient_basic -> honorific=request('honorific');
    $patient_basic -> district=request('district');
    $patient_basic -> contact_addresse=request('contact_address');
    $patient_basic -> contact_tele=request('contact_tele');
    $patient_basic -> guardian_name=request('guardian_name');
    $patient_basic -> guardian_tele=request('guardian_tele');
    $patient_basic -> guardian_address=request('guardian_address');
    $patient_basic -> guardian_relationship=request('guardian_relationship');
    $patient_basic -> presenting_complain_co=request('presenting_complain_co');
    $patient_basic -> presenting_complain_ho=request('presenting_complain_ho');
    $patient_basic -> medical_history=request('medical_history');
    $patient_basic -> current_medications=request('current_medications');
    $patient_basic -> special_referrals=request('special_referrals');
    $patient_basic -> entered_by=request('entered_by');
    $patient_basic -> save();
    return redirect('/create');
});



