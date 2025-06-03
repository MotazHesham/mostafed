@extends('tenant.layouts.master')
@section('content')
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
        <table class=" table table-bordered table-striped table-hover ajaxTable w-100 datatable-CourseStudent">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('course_student_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.course-students.massDestroy') }}",
    className: 'btn-danger-light rounded-pill',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.course-students.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'course_trainer', name: 'course.trainer' },
{ data: 'beneficiary_dob', name: 'beneficiary.dob' },
{ data: 'beneficiary_family_name', name: 'beneficiary_family.name' },
{ data: 'note', name: 'note' },
{ data: 'certificate', name: 'certificate' },
{ data: 'transportation', name: 'transportation' },
{ data: 'prev_experience', name: 'prev_experience' },
{ data: 'prev_courses', name: 'prev_courses' },
{ data: 'attend_same_course_before', name: 'attend_same_course_before' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-CourseStudent').DataTable(dtOverrideGlobals);
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection