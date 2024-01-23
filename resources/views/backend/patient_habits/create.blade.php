@extends('backend.layouts.app')

@section('title', __('Patient Habit Records'))

@section('content')
    <div>
        {!! Form::open([
            'url' => route('admin.patient_habits.store'),
            'method' => 'post',
            'class' => 'container',
            'files' => true,
            'enctype' => 'multipart/form-data',
        ]) !!}
        <x-backend.card>

            <x-slot name="header">
                Patient Habit Records : Create
            </x-slot>

            <x-slot name="body">

            </x-slot>

            <x-slot name="footer">
                {!! Form::submit('Create', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('admin.patient_habits.index') }}" class="btn btn-light mr-2 float-right">Back</a>
            </x-slot>

        </x-backend.card>
        {!! Form::close() !!}

    </div>
@endsection
