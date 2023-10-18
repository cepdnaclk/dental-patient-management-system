<?php

namespace App\Http\Livewire\Backend;

use App\Models\Patient\PatientHygiene;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class PatientHygieneTable extends DataTableComponent
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
        return PatientHygiene::query()
            ->when($this->getFilter('brushing_tool'), fn ($query, $status) => $query->where('brushing_tool', $status))
            ->when($this->getFilter('brushing_frequency'), fn ($query, $status) => $query->where('brushing_frequency', $status));
    }

      public function filters(): array
     {
        $brushing_tool= ["" => "Any"];
        foreach (PatientHygiene::brushing_tools() as $key => $value) {
            $brushing_tool[$key] = $value;
        }
        $brushing_frequency= ["" => "Any"];
        foreach (PatientHygiene::brushing_freqs() as $key => $value) {
             $brushing_frequency[$key] = $value;
        }

         return [
             'brushing_tool' => Filter::make('Brushing Tool')
                 ->select($brushing_tool),
             'brushing_frequency' => Filter::make('Brushing Frequency')
                 ->select($brushing_frequency),
         ];
     }

    public function rowView(): string
    {
        return 'backend.patient_hygiene.index-table-row';
    }
}
