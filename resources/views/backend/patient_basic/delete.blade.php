@extends('backend.layouts.app')

@section('title', __('Basic Patient Records'))

@section('content')
    <div>
        <x-backend.card>
            <x-slot name="header">
                Basic Patient Records : Delete | {{ $patientBasic->id }}
            </x-slot>

            <x-slot name="body">
                <p>Are you sure you want to delete
                    <strong><i>"{{ $patientBasic->name }} ({{ $patientBasic->reg_number }})"</i></strong> ?
                </p>
                <div class="d-flex">
                    {!! Form::open([
                        'url' => route('admin.patient_basic.destroy', compact('patientBasic')),
                        'method' => 'delete',
                        'class' => 'container',
                    ]) !!}

                    <a href="{{ route('admin.patient_basic.index') }}" class="btn btn-light mr-2">Back</a>
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </div>
            </x-slot>
        </x-backend.card>
    </div>
@endsection
