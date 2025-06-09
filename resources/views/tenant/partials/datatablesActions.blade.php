
@can($viewGate)
    <a class="btn btn-sm btn-icon btn-primary-light" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
        <i class="ri-eye-line"></i>
    </a>
@endcan
@can($editGate)
    <a class="btn btn-sm btn-icon btn-info-light" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
        <i class="ri-edit-line"></i>
    </a>
@endcan
@can($deleteGate)
    <button class="btn btn-sm btn-icon btn-danger-light" onclick="deleteRecord('{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}', {{ $row->id }})">
        <i class="ri-delete-bin-line"></i>
    </button>
@endcan
