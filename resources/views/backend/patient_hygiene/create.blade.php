@extends('backend.layouts.app')

@section('title', __('Patient Hygiene Records'))

@section('content')
    <div>
        {!! Form::open([
            'url' => route('admin.patient_hygiene.store'),
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

            <!--Brushing Tool-->
            <div class="form-group row">
                {!! Form::label('brushing_tool', 'Brushing Tool', ['class' => 'col-md-2 col-form-label']) !!}

               <div class="col-md-10">
                   {!! Form::select('brushing_tool', $brushing_tools, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                   @error('brushing_tool')
                   <strong>{{ $message }}</strong>
                   @enderror
               </div>
           </div>
            
            <!--Toothbrush Type-->
            <div class="form-group row">
                {!! Form::label('toothbrush_type', 'Toothbrush Type', ['class' => 'col-md-2 col-form-label']) !!}

               <div class="col-md-10">
                   {!! Form::select('toothbrush_type', $toothbrush_types, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                   @error('toothbrush_type')
                   <strong>{{ $message }}</strong>
                   @enderror
               </div>
            </div>

           <!--Toothbrush Features-->
           <div class="form-group row">
            {!! Form::label('toothbrush_features', 'Toothbrush Features', ['class' => 'col-md-2 col-form-label']) !!}

             <div class="col-md-10">
                 {!! Form::select('toothbrush_features', $toothbrush_features, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                 @error('toothbrush_features')
                 <strong>{{ $message }}</strong>
                 @enderror
             </div>
           </div>

            <!--Brushing Frequency-->
           <div class="form-group row">
            {!! Form::label('brushing_frequency', 'Brushing Frequency', ['class' => 'col-md-2 col-form-label']) !!}

             <div class="col-md-10">
                 {!! Form::select('brushing_frequency', $brushing_freqs, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                 @error('brushing_frequency')
                 <strong>{{ $message }}</strong>
                 @enderror
             </div>
           </div>
          
            <!--Supplementry Tool-->
           <div class="form-group row">
            {!! Form::label('supplementry_tool', 'Supplementry Tool', ['class' => 'col-md-2 col-form-label']) !!}

             <div class="col-md-10">
                 {!! Form::select('supplementry_tool', $supplementry_tools, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                 @error('supplementry_tool')
                 <strong>{{ $message }}</strong>
                 @enderror
             </div>
           </div>

            <!--Supplementry Tool Other-->
            <div class="form-group row">
                {!! Form::label('supplementry_tool_other', 'Supplementry Tool Other', ['class' => 'col-md-2 col-form-label']) !!}

                <div class="col-md-10">
                     {!! Form::textarea('supplementry_tool_other', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true, ]) !!}
                     @error('supplementry_tool_other')
                     <strong>{{ $message }}</strong>
                     @enderror
                </div>
            </div>
           
            <!--Toothpaste-->
           <div class="form-group row">
            {!! Form::label('toothpaste', 'Toothpaste', ['class' => 'col-md-2 col-form-label']) !!}

             <div class="col-md-10">
                 {!! Form::select('toothpaste', $toothpastes, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                 @error('toothpaste')
                 <strong>{{ $message }}</strong>
                 @enderror
             </div>
           </div>

            <!--Toothpaste Other-->
           <div class="form-group row">
            {!! Form::label('toothpaste_other', 'Toothpaste Other', ['class' => 'col-md-2 col-form-label']) !!}

             <div class="col-md-10">
                 {!! Form::select('toothpaste_other', $toothpastes, null, ['class'=>'form-control', 'required'=>true, 'placeholder' => '']) !!}
                 @error('toothpaste_other')
                 <strong>{{ $message }}</strong>
                 @enderror
             </div>
           </div>

            <!-- Mouthwash -->
            <div class="form-group row">
                {!! Form::label('mouthwash', 'Mouthwash', ['class' => 'col-md-2 form-check-label']) !!}

                <div class="col-md-4 form-check">
                    {!! Form::checkbox('mouthwash', '1', ['class'=>'form-check-input', 'required'=>true,]) !!}
                    @error('mouthwash')
                    <strong>{{ $message }}</strong>
                    @enderror
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
                         {!! Form::textarea('updated_user', '', ['class'=>'form-control', 'rows'=>3, 'required'=>true,'placeholder' => 'Admin-1 / User-2' ]) !!}
                         @error('updated_user')
                        <strong>{{ $message }}</strong>
                       @enderror
                    </div>
                </div>


            </x-slot>

            <x-slot name="footer">
                {!! Form::submit('Create', ['class' => 'btn btn-primary float-right']) !!}
                <a href="{{ route('admin.patient_hygiene.index') }}" class="btn btn-light mr-2 float-right">Back</a>
            </x-slot>

        </x-backend.card>
        {!! Form::close() !!}

    </div>
@endsection