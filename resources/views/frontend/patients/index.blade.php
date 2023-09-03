@extends('frontend.layouts.app')

@section('title', __('Create Clinical Visit'))

@section('content')
    <div class="container py-4">
       <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Create Clinical Visit')
                    </x-slot>

                    <x-slot name="body">
                        <h1>Records List</h1>

                        {{-- <ul>
                            @foreach($records as $record)
                                <li>
                                    <a href="{{ route('records.show', $record->id) }}">{{ $record->name }}</a>
                                </li>
                            @endforeach
                        </ul> --}}
                        <li>
                            <a href="#">{{ "Patient 1" }}</a>
                            <button class="btn btn-sm btn-primary float-right mr-2">View</button>
                            <button class="btn btn-sm btn-primary float-right mr-2">Update</button>
                            <button class="btn btn-sm btn-primary float-right mr-2">Delete</button>
                        </li>
                        <li>
                            <a href="#">{{ "Patient 2" }}</a>
                            <button class="btn btn-sm btn-primary float-right mr-2">View</button>
                            <button class="btn btn-sm btn-primary float-right mr-2">Update</button>
                            <button class="btn btn-sm btn-primary float-right mr-2">Delete</button>
                        </li>
                        <li>
                            <a href="#">{{ "Patient 3" }}</a>
                            <button class="btn btn-sm btn-primary float-right mr-2">View</button>
                            <button class="btn btn-sm btn-primary float-right mr-2">Update</button>
                            <button class="btn btn-sm btn-primary float-right mr-2">Delete</button>
                        </li>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection