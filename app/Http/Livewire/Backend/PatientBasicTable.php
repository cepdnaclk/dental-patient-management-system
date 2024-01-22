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
            Column::make("Registration Number", "reg_number")
                ->sortable(),
            Column::make("Actions")
        ];
    }

    public function query(): Builder
    {
        return PatientBasic::query();
    }

    // TODO
    // public function filters(): array
    // {
    // }

    public function rowView(): string
    {
        return 'backend.patient_basic.index-table-row';
    }
}
