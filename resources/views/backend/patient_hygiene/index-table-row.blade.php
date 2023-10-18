
<x-livewire-tables::table.cell>
    {{ $row->patient_id }}
</x-livewire-tables::table.cell>


<x-livewire-tables::table.cell>
    <div class="d-flex px-0 mt-0 mb-0">
        <div class="btn-group" role="group" aria-label="">
            <a href="{{ route('admin.patient_hygiene.edit', $row) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"
                    title="Edit"></i>
            </a>
            <a href="{{ route('admin.patient_hygiene.delete', $row) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"
                    title="Delete"></i>
            </a>
        </div>
    </div>
</x-livewire-tables::table.cell>
