@extends('backend.layouts.app')

@section('title', __('Basic Patient Records'))

@section('content')
    <div>
        {!! Form::open([
            'url' => route('admin.patient_basic.update', compact('patientBasic')),
            'method' => 'put',
            'class' => 'container',
            'files' => true,
            'enctype' => 'multipart/form-data',
        ]) !!}

        <x-backend.card>
            <x-slot name="header">
                Basic Patient Records : Edit | {{ $patientBasic->reg_number }}
            </x-slot>

            <x-slot name="body">
            <!--Reg_no-->
            <div class="form-group row">
                    <label for="reg_number" class="col-md-2 col-form-label">@lang('Registration number')</label>
                    <div class="col-md-10">
                        <input type="text" name="reg_number" class="form-control" placeholder="{{ __('Regitration Number') }}" value="{{ old('reg_number') }}" maxlength="100" required />
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                {!! Form::submit('Update', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('admin.patient_basic.index') }}" class="btn btn-light mr-2 float-right">Back</a>
            </x-slot>

        </x-backend.card>
        {!! Form::close() !!}
    </div>
@endsection
