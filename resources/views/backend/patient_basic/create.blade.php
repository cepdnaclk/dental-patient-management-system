@extends('backend.layouts.app')

@section('title', __('Basic Patient Records'))

@section('content')
    <div>
        {!! Form::open([
            'url' => route('admin.patient_basic.store'),
            'method' => 'post',
            'class' => 'container',
            'files' => true,
            'enctype' => 'multipart/form-data',
        ]) !!}
        <x-backend.card>

            <x-slot name="header">
                Basic Patient Records : Create
            </x-slot>

            <x-slot name="body">

            </x-slot>

            <x-slot name="footer">
                {!! Form::submit('Create', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('admin.patient_basic.index') }}" class="btn btn-light mr-2 float-right">Back</a>
            </x-slot>

        </x-backend.card>
        {!! Form::close() !!}

    </div>
@endsection
