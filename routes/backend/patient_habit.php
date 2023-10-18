<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\PatientBasicController;
use App\Http\Controllers\Backend\PatientHabitController;

Route::group(['prefix' => 'patients/habit'], function () {

    Route::get('/', [PatientHabitController::class, 'index'])->name('patient_habit.index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habit'), route('admin.patient_habit.index'));
        });

    // Create
    Route::get('/create', [PatientHabitController::class, 'create'])
        ->name('patient_habit.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habit'), route('admin.patient_habit.index'))
                ->push(__('Create'));
        });

    // Store
    Route::post('/', [PatientHabitController::class, 'store'])
        ->name('patient_habit.store');

    // Edit
    Route::get('/edit/{patientHabits}', [PatientHabitController::class, 'edit'])
        ->name('patient_habit.edit')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habit'), route('admin.patient_habit.index'))
                ->push(__('Edit'));
        });

    // Update
    Route::put('/{patientHabits}', [PatientHabitController::class, 'update'])
        ->name('patient_habit.update');

    // Delete
    Route::get('/delete/{patientHabits}', [PatientHabitController::class, 'delete'])
        ->name('patient_habit.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push(__('Home'), route('admin.dashboard'))
                ->push(__('Patients - Habit'), route('admin.patient_habit.index'))
                ->push(__('Delete'));
        });

    // Destroy
    Route::delete('/{patientHabits}', [PatientHabitController::class, 'destroy'])
        ->name('patient_habit.destroy');
});
