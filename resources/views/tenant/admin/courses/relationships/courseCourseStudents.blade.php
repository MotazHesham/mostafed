@can('course_student_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.course-students.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.courseStudent.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.courseStudent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover w-100 datatable-courseCourseStudents">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.course') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.beneficiary') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.beneficiary_family') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.note') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.certificate') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.transportation') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.prev_experience') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.prev_courses') }}
                        </th>
                        <th>
                            {{ trans('cruds.courseStudent.fields.attend_same_course_before') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courseStudents as $key => $courseStudent)
                        <tr data-entry-id="{{ $courseStudent->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $courseStudent->id ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->course->trainer ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->beneficiary->dob ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->beneficiary_family->name ?? '' }}
                            </td>
                            <td>
                                {{ $courseStudent->note ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $courseStudent->certificate ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $courseStudent->certificate ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $courseStudent->transportation ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $courseStudent->transportation ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $courseStudent->prev_experience ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $courseStudent->prev_experience ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $courseStudent->prev_courses ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $courseStudent->attend_same_course_before ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $courseStudent->attend_same_course_before ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('course_student_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.course-students.show', $courseStudent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('course_student_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.course-students.edit', $courseStudent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('course_student_delete')
                                    <form action="{{ route('admin.course-students.destroy', $courseStudent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('course_student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.course-students.massDestroy') }}",
    className: 'btn-danger-light rounded-pill',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-courseCourseStudents:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection