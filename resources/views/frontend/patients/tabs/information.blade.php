<x-forms.patch>
    <form action="">
        <div class="form-group row">
            <label for="patient_id" class="col-md-4 col-form-label text-md-right">@lang('Patient id: ')</label>

            <div class="col-md-6">
                <input type="text" name="patient_id" id="patient_id" class="form-control"
                    placeholder="{{ __('') }}" 
                    />
            </div>
        </div>

        <div class="form-group row">
            <label for="Status" class="col-md-4 col-form-label text-md-right">@lang('Status: ')</label>

            <div class="col-md-6">
                <input type="number" name="home_address" id="home_address" class="form-control"
                    placeholder="{{ __('0') }}" 
                    />
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-4 col-form-label text-md-right">@lang('Date: ')</label>

            <div class="col-md-6">
                <input type="date" name="dob" id="dob" class="form-control"
                    placeholder="{{ __('') }}" 
                    />
            </div>
        </div>
        <div class="form-group row">
            <label for="next_visit" class="col-md-4 col-form-label text-md-right">@lang('Next Visit: ')</label>

            <div class="col-md-6">
                <input type="date" name="next_visit" id="next_visit" class="form-control"
                    placeholder="{{ __('') }}" 
                    />
            </div>
        </div>
        <div class="form-group row">
            <label for="approved_by" class="col-md-4 col-form-label text-md-right">@lang('Approved by: ')</label>

            <div class="col-md-6">
                <select name="approved_by" id="approved_by" class="form-control">
                    <option value="person1">Person 1</option>
                    <option value="person2">Person 2</option>
                    <option value="person3">Person 3</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="Note" class="col-md-4 col-form-label text-md-right">@lang('Note : ')</label>

            <div class="col-md-6">
                <input type="text" name="note" id="note" class="form-control"
                    placeholder="{{ __('notes') }}" 
                    />
            </div>
        </div>
        

        
        <div class="col-md-12" style="color: rgb(155, 155, 136)">
            Created by : {{ $logged_in_user->name }}
            {{-- Time stamp :{{ Carbon::now()->format('Y-m-d H:i:s')}} --}}
        </div>

    </form>

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>
