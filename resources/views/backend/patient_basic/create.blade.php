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
    
            <!--Reg_no-->
            <div class="form-group row">
                    <label for="reg_number" class="col-md-2 col-form-label">@lang('Registration number')</label>
                    <div class="col-md-10">
                        <input type="text" name="reg_number" class="form-control" placeholder="{{ __('Regitration Number') }}" value="{{ old('reg_number') }}" maxlength="100" required />
                    </div>
                </div>

            <!--Name-->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                    </div>
                </div>
            
            <!--Date Of Birth-->
                <div class="form-group row">
                    {!! Form::label('dob', 'Date Of Birth', ['class' => 'col-md-2 col-form-label']) !!}
                    <div class="col-md-4 pt-3">
                       {!! Form::datetimeLocal('dob', '', ['class'=>'form-control', 'required'=>true,]) !!}
                       @error('dob')
                       <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

            <!--Initial Visit-->
                <div class="form-group row">
                    {!! Form::label('initial_visit', 'Initial Visit', ['class' => 'col-md-2 col-form-label']) !!}
                    <div class="col-md-4 pt-3">
                       {!! Form::datetimeLocal('initial_visit', '', ['class'=>'form-control', 'required'=>true,]) !!}
                       @error('initial_visit')
                       <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

            <!--Gender-->
                <div class="form-group row">
                    {!! Form::label('gender', 'Gender', ['class' => 'col-md-2 col-form-label']) !!}

                   <div class="col-md-10">
                       {!! Form::select('gender', $genders, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                       @error('gender')
                       <strong>{{ $message }}</strong>
                       @enderror
                   </div>
               </div>
            
            
            <!--Ethinicity-->
            <div class="form-group row">
                    {!! Form::label('ethnicity', 'Ethnicity', ['class' => 'col-md-2 col-form-label']) !!}

                   <div class="col-md-10">
                       {!! Form::select('ethnicity', $ethnicities, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                       @error('ethnicity')
                       <strong>{{ $message }}</strong>
                       @enderror
                   </div>
               </div>

            <!--Honorific-->
                <div class="form-group row">
                    {!! Form::label('honorific', 'Honorific', ['class' => 'col-md-2 col-form-label']) !!}

                   <div class="col-md-10">
                       {!! Form::select('honorific', $honorifics, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                       @error('honorific')
                       <strong>{{ $message }}</strong>
                       @enderror
                   </div>
               </div>

            <!--District-->
               <div class="form-group row">
                {!! Form::label('district', 'District', ['class' => 'col-md-2 col-form-label']) !!}

               <div class="col-md-10">
                   {!! Form::select('district', $districts, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                   @error('district')
                   <strong>{{ $message }}</strong>
                   @enderror
               </div>
           </div>

            <!--Contact Address-->
                <div class="form-group row">
                    {!! Form::label('contact_address', 'Contact Address', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('contact_address', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('contact_address')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

            <!--Contact Telephone-->
                <div class="form-group row">
                    <label for="contact_tele" class="col-md-2 col-form-label">@lang('Telephone')</label>
                    <div class="col-md-10">
                        <input type="text" name="contact_tele" class="form-control" placeholder="{{ __('Telephone') }}" value="{{ old('contact_tele') }}" maxlength="100" required />
                    </div>
                </div>

            <!--Guardian Name-->
                <div class="form-group row">
                    <label for="guardian_name" class="col-md-2 col-form-label">@lang('Guardian Name')</label>
                    <div class="col-md-10">
                        <input type="text" name="guardian_name" class="form-control" placeholder="{{ __('Guardian Name') }}" value="{{ old('guardian_name') }}" maxlength="100" required />
                    </div>
                </div>

            <!--Guardian Telephone-->
                <div class="form-group row">
                    <label for="guardian_tele" class="col-md-2 col-form-label">@lang('Guardian Telephone')</label>
                    <div class="col-md-10">
                        <input type="text" name="guardian_tele" class="form-control" placeholder="{{ __('Guardian Telephone') }}" value="{{ old('guardian_tele') }}" maxlength="100" required />
                    </div>
                </div> 

            <!--Guardian Address-->
                <div class="form-group row">
                    {!! Form::label('guardian_address', 'Guardian Address', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('guardian_address', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('guardian_address')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

            <!--Guardian Relationship-->
                <div class="form-group row">
                    {!! Form::label('guardian_relationship', 'Guardian Relationship', ['class' => 'col-md-2 col-form-label']) !!}
    
                   <div class="col-md-10">
                       {!! Form::select('guardian_relationship', $guardian_relationships, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                       @error('guardian_relationship')
                       <strong>{{ $message }}</strong>
                       @enderror
                   </div>
               </div>

            <!--Presenting Complain Co-->
                <div class="form-group row">
                    {!! Form::label('presenting_complain_co', 'presenting_complain_co', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('presenting_complain_co', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('presenting_complain_co')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

            <!--Presenting Complain Ho-->
                <div class="form-group row">
                    {!! Form::label('presenting_complain_ho', 'presenting_complain_ho', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('presenting_complain_ho', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('presenting_complain_ho')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

            <!--Medicle History-->
                <div class="form-group row">
                    {!! Form::label('medical_history', 'Medical History', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('medical_history', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('medical_history')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

             <!--Current Medifications-->
                <div class="form-group row">
                    {!! Form::label('current_medications', 'Current Medications', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('current_medications', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('current_medications')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

             <!--Special Refferals-->
                <div class="form-group row">
                    {!! Form::label('special_referrals', 'Special Referrals', ['class' => 'col-md-2 col-form-label']) !!}

                    <div class="col-md-10">
                         {!! Form::textarea('special_referrals', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                         @error('special_referrals')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>

            

            </x-slot>

            <x-slot name="footer">
                {!! Form::submit('Create', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('admin.patient_basic.index') }}" class="btn btn-light mr-2 float-right">Back</a>
            </x-slot>

        </x-backend.card>
        {!! Form::close() !!}

    </div>
@endsection
