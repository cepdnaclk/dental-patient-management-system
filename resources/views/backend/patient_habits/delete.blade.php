@extends('backend.layouts.app')

@section('title', __('Patient Habit Records'))

@section('content')
    <div>
        <x-backend.card>
            <x-slot name="header">
                Patient Habit Records : Delete | {{ $patientHabits->id }}
            </x-slot>

            <x-slot name="body">
                <p>Are you sure you want to delete
                    <strong><i>"{{ $patientHabits->patient->name }}
                            ({{ $patientHabits->patient->reg_number }})"</i></strong> ?
                </p>
                <div class="d-flex">
                    {!! Form::open([
                        'url' => route('admin.patient_habits.destroy', compact('patientHabits')),
                        'method' => 'delete',
                        'class' => 'container',
                    ]) !!}

                    <a href="{{ route('admin.patient_habits.index') }}" class="btn btn-light mr-2">Back</a>
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </div>
            </x-slot>
        </x-backend.card>
    </div>
@endsection
