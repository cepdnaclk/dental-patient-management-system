<?php

namespace App\Http\Livewire\Backend;

use App\Models\Patient\PatientBasic;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class PatientBasicTable extends DataTableComponent
{
    public array $perPageAccepted = [25, 50, 100];
    public bool $perPageAll = true;

    public function columns(): array
    {
        return [
            Column::make("Patient ID", "id")
                ->sortable(),
            Column::make("Registration Number", "reg_number")
                ->sortable(),
            Column::make("Actions")
        ];
    }

    public function query(): Builder
    {
        return PatientBasic::query()
            ->when($this->getFilter('honorific'), fn ($query, $status) => $query->where('honorific', $status))
            ->when($this->getFilter('district'), fn ($query, $type) => $query->where('district', $type));
    }

     public function filters(): array
    {
        $honorific= ["" => "Any"];
        foreach (PatientBasic::honorifics() as $key => $value) {
            $honorific[$key] = $value;
        }
        $district= ["" => "Any"];
        foreach (PatientBasic::districts() as $key => $value) {
            $district[$key] = $value;
        }

        return [
            'honorific' => Filter::make('Honorific')
                ->select($honorific),
            'district' => Filter::make('District')
                ->select($district),
        ];
    }

    public function rowView(): string
    {
        return 'backend.patient_basic.index-table-row';
    }
}
