@extends('frontend.layouts.app')

@section('title', __('Delete Clinical Visit'))

@section('content')
    <div class="container py-4">
       <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Delete Clinical Visit')
                    </x-slot>

                    <x-slot name="body">
                        <div class="form-group row">
                            <label for="patient_id" class="col-md-4 col-form-label text-md-right">@lang('Patient id: ')</label>

                            <div class="col-md-6">
                                <input type="text" name="patient_id" id="patient_id" class="form-control"
                                    placeholder="{{ __('') }}" 
                                    />
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Delete Record')</button>
                            </div>
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

