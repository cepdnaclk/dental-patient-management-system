<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\PatientBasicController;

Route::group(['prefix' => 'patients/basic'], function () {

    Route::get('/', [PatientBasicController::class, 'index'])->name('patient_basic.index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Basic'), route('admin.patient_basic.index'));
        });

    // Create
    Route::get('/create', [PatientBasicController::class, 'create'])
        ->name('patient_basic.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Basic'), route('admin.patient_basic.index'))
                ->push(__('Create'));
        });

    // Store
    Route::post('/', [PatientBasicController::class, 'store'])
        ->name('patient_basic.store');

    // Edit
    Route::get('/edit/{patientBasic}', [PatientBasicController::class, 'edit'])
        ->name('patient_basic.edit')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Basic'), route('admin.patient_basic.index'))
                ->push(__('Edit'));
        });

    // Update
    Route::put('/{patientBasic}', [PatientBasicController::class, 'update'])
        ->name('patient_basic.update');

    // Delete
    Route::get('/delete/{patientBasic}', [PatientBasicController::class, 'delete'])
        ->name('patient_basic.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Basic'), route('admin.patient_basic.index'))
                ->push(__('Delete'));
        });

    // Destroy
    Route::delete('/{patientBasic}', [PatientBasicController::class, 'destroy'])
        ->name('patient_basic.destroy');
});
