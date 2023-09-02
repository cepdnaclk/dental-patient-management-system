<?php

use App\Http\Controllers\Frontend\Patients\PatientEditController;
use App\Http\Controllers\Frontend\Patients\PatientCreateController;
use App\Http\Controllers\Frontend\Patients\PatientDeleteController;
use App\Http\Controllers\Frontend\Patients\PatientViewController;
use Tabuna\Breadcrumbs\Trail;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */

Route::group([], function () {
    Route::get('dashboard/clinical-records', [PatientViewController::class, 'index'])
    ->middleware('is_user')
    ->name('view')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Clinical Records'), route('frontend.user.dashboard'));
    });

    Route::get('dashboard/patient/create', [PatientCreateController::class, 'index'])
    ->middleware('is_user')
    ->name('create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Create Patient Profile'), route('frontend.user.dashboard'));
    });
    
    Route::get('dashboard/patient/edit', [PatientEditController::class, 'index'])
    ->middleware('is_user')
    ->name('edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Edit Patient Details'), route('frontend.user.dashboard'));
    });

    Route::get('dashboard/patient/delete', [PatientDeleteController::class, 'index'])
    ->middleware('is_user')
    ->name('delete')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Delete Patient Record'), route('frontend.user.dashboard'));
    });
});