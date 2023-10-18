@extends('backend.layouts.app')

@section('title', __('Patient Habit Records'))

@section('content')
    <div>
        {!! Form::open([
            'url' => route('admin.patient_habit.store'),
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
    
            <!--Patient ID-->
            <div class="form-group row">
                    <label for="patient_id" class="col-md-2 col-form-label">@lang('Patient ID')</label>
                    <div class="col-md-10">
                        <input type="text" name="patient_id" class="form-control" placeholder="{{ __('Patient ID') }}" value="{{ old('patient_id') }}" maxlength="100" required />
                    </div>
                </div>

            <!--Smoking-->
            <div class="form-group row">
                {!! Form::label('smoking', 'Smoking', ['class' => 'col-md-2 col-form-label']) !!}

               <div class="col-md-10">
                   {!! Form::select('smoking', $smoking_types, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                   @error('smoking')
                   <strong>{{ $message }}</strong>
                   @enderror
               </div>
           </div>
            
            <!--Smoing Frequency-->
            <div class="form-group row">
                {!! Form::label('smoking_frequency', 'Smoing Frequency', ['class' => 'col-md-2 col-form-label']) !!}

               <div class="col-md-10">
                   {!! Form::select('smoking_frequency', $smoking_freq, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                   @error('smoking_frequency')
                   <strong>{{ $message }}</strong>
                   @enderror
               </div>
           </div>

           <!--Smoking Duration-->
           <div class="form-group row">
                <label for="smoking_duration" class="col-md-2 col-form-label">@lang('Smoking Duration')</label>
                <div class="col-md-10">
                       <input type="number" name="smoking_duration" class="form-control" placeholder="{{ __('Smoking Duration') }}" value="{{ old('smoking_duration') }}" maxlength="100" required />
                </div>
            </div>

            <!--Ex Smoking Duration-->
           <div class="form-group row">
                <label for="ex_smoking_duration" class="col-md-2 col-form-label">@lang('Ex Smoking Duration')</label>
                <div class="col-md-10">
                    <input type="number" name="ex_smoking_duration" class="form-control" placeholder="{{ __('Ex Smoking Duration') }}" value="{{ old('ex_smoking_duration') }}" maxlength="100" required />
                </div>
            </div>
          
            <!-- Betal Chewing -->
            <div class="form-group row">
                {!! Form::label('betal_chewing', 'Betal Chewing', ['class' => 'col-md-2 form-check-label']) !!}

                <div class="col-md-4 form-check">
                    {!! Form::checkbox('betal_chewing', '1', ['class'=>'form-check-input', 'required'=>true,]) !!}
                    @error('betal_chewing')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
             </div>

             <!-- Betal Chewing Tabacco -->
            <div class="form-group row">
                {!! Form::label('betal_chewing_tabacco', 'Betal Chewing Tabacco', ['class' => 'col-md-2 form-check-label']) !!}

                <div class="col-md-4 form-check">
                    {!! Form::checkbox('betal_chewing_tabacco', '1', ['class'=>'form-check-input', 'required'=>true,]) !!}
                    @error('betal_chewing_tabacco')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
             </div>
           
              <!--Betal Chewing Details-->
              <div class="form-group row">
                {!! Form::label('betal_chewing_details	', 'Betal Chewing Details', ['class' => 'col-md-2 col-form-label']) !!}

                <div class="col-md-10">
                     {!! Form::textarea('betal_chewing_details	', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                     @error('betal_chewing_details	')
                    <strong>{{ $message }}</strong>
                   @enderror
                </div>
            </div>

            <!-- Smokeless Tabacco -->
            <div class="form-group row">
                {!! Form::label('smokeless_tabaco', 'Smokeless Tabacco', ['class' => 'col-md-2 form-check-label']) !!}

                <div class="col-md-4 form-check">
                    {!! Form::checkbox('smokeless_tabaco', '1', ['class'=>'form-check-input', 'required'=>true,]) !!}
                    @error('smokeless_tabaco')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
             </div>

            <!-- Alcohol -->
            <div class="form-group row">
                {!! Form::label('alcohol', 'Alcohol', ['class' => 'col-md-2 form-check-label']) !!}

                <div class="col-md-4 form-check">
                    {!! Form::checkbox('alcohol', '1', ['class'=>'form-check-input', 'required'=>true,]) !!}
                    @error('alcohol')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
             </div>

            <!--Alcohol Frequency-->
                <div class="form-group row">
                    {!! Form::label('alcohol_frequency', 'Alcohol Frequency', ['class' => 'col-md-2 col-form-label']) !!}

                   <div class="col-md-10">
                       {!! Form::select('alcohol_frequency', $alcohol_freq, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                       @error('alcohol_frequency')
                       <strong>{{ $message }}</strong>
                       @enderror
                   </div>
               </div>

            <!--Alcohol Duration-->
            <div class="form-group row">
            <label for="alcohol_duration" class="col-md-2 col-form-label">@lang('Alcohol Duration')</label>
                <div class="col-md-10">
                   <input type="number" name="alcohol_duration" class="form-control" placeholder="{{ __('Alcohol Duration') }}" value="{{ old('alcohol_duration') }}" maxlength="100" required />
                </div>
            </div>
            
            <!--Other Details-->
                <div class="form-group row">
                    {!! Form::label('other', 'Other Details', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('other', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('other')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

                <!--Updated Information-->
                <div class="form-group row">
                    {!! Form::label('updated_user', 'Updated Information-', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('updated_user', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, 'placeholder' => 'Admin-1 / User-2']) !!}
                         @error('updated_user')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>


            </x-slot>

            <x-slot name="footer">
                {!! Form::submit('Create', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('admin.patient_habit.index') }}" class="btn btn-light mr-2 float-right">Back</a>
            </x-slot>

        </x-backend.card>
        {!! Form::close() !!}

    </div>
@endsection