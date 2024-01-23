<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\PatientHabitsController;

Route::group(['prefix' => 'patients/habits'], function () {

    Route::get('/', [PatientHabitsController::class, 'index'])->name('patient_habits.index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habits'), route('admin.patient_habits.index'));
        });

    // Create
    Route::get('/create', [PatientHabitsController::class, 'create'])
        ->name('patient_habits.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habits'), route('admin.patient_habits.index'))
                ->push(__('Create'));
        });

    // Store
    Route::post('/', [PatientHabitsController::class, 'store'])
        ->name('patient_habits.store');

    // Edit
    Route::get('/edit/{patientHabits}', [PatientHabitsController::class, 'edit'])
        ->name('patient_habits.edit')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habits'), route('admin.patient_habits.index'))
                ->push(__('Edit'));
        });

    // Update
    Route::put('/{patientHabits}', [PatientHabitsController::class, 'update'])
        ->name('patient_habits.update');

    // Delete
    Route::get('/delete/{patientHabits}', [PatientHabitsController::class, 'delete'])
        ->name('patient_habits.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habits'), route('admin.patient_habits.index'))
                ->push(__('Delete'));
        });

    // Destroy
    Route::delete('/{patientHabits}', [PatientHabitsController::class, 'destroy'])
        ->name('patient_habits.destroy');
});
