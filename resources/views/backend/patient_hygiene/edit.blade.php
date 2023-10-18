@extends('backend.layouts.app')

@section('title', __('Basic Hygiene Records'))

@section('content')
    <div>
        {!! Form::open([
            'url' => route('admin.patient_hygiene.update', compact('patientHygiene')), 
            'method' => 'put',
            'class' => 'container',
            'files' => true,
            'enctype' => 'multipart/form-data',
        ]) !!}

        <x-backend.card>
            <x-slot name="header">
                Basic Habit Records : Edit | {{ $patientHygiene->patient_id }}
            </x-slot>

            <x-slot name="body">
                <!--Patient ID
                <div class="form-group row">
                    <label for="patient_id" class="col-md-2 col-form-label">@lang('Patient ID')</label>
                    <div class="col-md-10">
                        <input type="text" name="patient_id" class="form-control" placeholder="{{ __('Patient ID') }}" value="{{ old('patient_id') }}" maxlength="100" required />
                    </div>
                </div>-->

                <!-- other details-->
                <div class="form-group row">
                    {!! Form::label('other', 'Change Other Details', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                        {!! Form::textarea('other',  $patientHygiene->other, ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                        @error('other')
                        <strong>{{ $patientHygiene }}</strong>
                        @enderror
                    </div>
                </div>

            </x-slot>
            <x-slot name="footer">
                {!! Form::submit('Update', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('admin.patient_hygiene.index') }}" class="btn btn-light mr-2 float-right">Back</a>
            </x-slot>

        </x-backend.card>
        {!! Form::close() !!}
    </div>
@endsection
