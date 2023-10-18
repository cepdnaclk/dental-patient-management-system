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

Route::group(['prefix' => 'patient', 'as' => 'patient.', 'middleware' => 'auth'], function () {
    Route::get('create', [PatientController::class, 'create'])->name('create'); // Show the patient creation form
    Route::post('store', [PatientController::class, 'store'])->name('store'); // Store a new patient
    Route::get('list', [PatientController::class, 'list'])->name('list'); // List all patients
    // Add more patient-related routes as needed
});