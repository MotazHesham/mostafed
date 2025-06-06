<table class=" table table-bordered table-striped table-hover w-100">
    <thead>
        <tr>
            <th width="10">

            </th>
            <th>
                {{ trans('cruds.beneficiaryFamily.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.beneficiaryFamily.fields.name') }}
            </th>
            <th>
                {{ trans('cruds.beneficiaryFamily.fields.gender') }}
            </th>
            <th>
                {{ trans('cruds.beneficiaryFamily.fields.phone') }}
            </th>
            <th>
                {{ trans('cruds.beneficiaryFamily.fields.email') }}
            </th>
            <th>
                &nbsp;
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($beneficiaryFamilies && $beneficiaryFamilies->count() > 0)
            @foreach ($beneficiaryFamilies as $family)
                <tr>
                    <td></td>
                    <td>{{ $family->id }}</td>
                    <td>{{ $family->name }}</td>
                    <td>{{ $family->gender }}</td>
                    <td>{{ $family->phone }}</td>
                    <td>{{ $family->email }}</td>
                    <td>
                        #
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">{{ trans('global.no_data_found') }}</td>
            </tr>
        @endif
    </tbody>
</table>
