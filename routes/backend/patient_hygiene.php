<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\PatientHygieneController;

Route::group(['prefix' => 'patients/hygiene'], function () {

    Route::get('/', [PatientHygieneController::class, 'index'])->name('patient_hygiene.index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Hygiene'), route('admin.patient_hygiene.index'));
        });

    // Create
    Route::get('/create', [PatientHygieneController::class, 'create'])
        ->name('patient_hygiene.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Hygiene'), route('admin.patient_hygiene.index'))
                ->push(__('Create'));
        });

    // Store
    Route::post('/', [PatientHygieneController::class, 'store'])
        ->name('patient_hygiene.store');

    // Edit
    Route::get('/edit/{patientHygiene}', [PatientHygieneController::class, 'edit'])
        ->name('patient_hygiene.edit')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Hygiene'), route('admin.patient_hygiene.index'))
                ->push(__('Edit'));
        });

    // Update
    Route::put('/{patientHygiene}', [PatientHygieneController::class, 'update'])
        ->name('patient_hygiene.update');

    // Delete
    Route::get('/delete/{patientHygiene}', [PatientHygieneController::class, 'delete'])
        ->name('patient_hygiene.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Hygiene'), route('admin.patient_hygiene.index'))
                ->push(__('Delete'));
        });

    // Destroy
    Route::delete('/{patientHygiene}', [PatientHygieneController::class, 'destroy'])
        ->name('patient_hygiene.destroy');
});
