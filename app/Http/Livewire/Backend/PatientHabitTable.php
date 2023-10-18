<?php

namespace App\Http\Livewire\Backend;

use App\Models\Patient\PatientHabits;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class PatientHabitTable extends DataTableComponent
{
    public array $perPageAccepted = [25, 50, 100];
    public bool $perPageAll = true;

    public function columns(): array
    {
        return [
          
            Column::make("Patient Id", "patient_id")
                ->sortable(),
            Column::make("Actions")
        ];
    }

    public function query(): Builder
    {
        return PatientHabits::query()
            ->when($this->getFilter('smoking'), fn ($query, $status) => $query->where('smoking', $status))
            ->when($this->getFilter('alcohol_frequency'), fn ($query, $status) => $query->where('alcohol_frequency', $status));
    }


      public function filters(): array
     {
         $smoking= ["" => "Any"];
         foreach (PatientHabits::smoking_types() as $key => $value) {
            $smoking[$key] = $value;
        }
        $alcohol_frequency= ["" => "Any"];
        foreach (PatientHabits::alcohol_freq() as $key => $value) {
            $alcohol_frequency[$key] = $value;
         }

        return [
            'smoking' => Filter::make('Smoking')
                ->select($smoking),
           'alcohol_frequency' => Filter::make('Alcohol Frequency')
                ->select($alcohol_frequency),
        ];
     }

    public function rowView(): string
    {
        return 'backend.patient_habit.index-table-row';
    }
}
